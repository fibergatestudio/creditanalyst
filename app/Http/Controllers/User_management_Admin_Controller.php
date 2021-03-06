<?php
/*
* Управление пользователями с правами админа - создание пользователей, деактивация/удаление, управление привелегиями
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Mail\UserCreated;
use App\User;
use App\UserRoom;
use DB;
use Mail;

class User_management_Admin_Controller extends Controller
{
    /*Определение домена*/
    private function user_domain($room_id=0)
    {
        $domain = '';
        $user_rooms = UserRoom::all();
        if (count($user_rooms) > 0 AND $room_id > 0){
            foreach ($user_rooms as $user_room) {
                if ($user_room->id === (int)$room_id) {
                    $domain = $user_room->domain;
                }
            }
        }
        return $domain;
    }
    
    /* Список всех пользователейи кабинетов(для админа приложения) и переход к созданию */
    public function index(){
        $users = User::paginate(5);
        $user_rooms = UserRoom::paginate(3);
        $user_room_id = Auth::user()->user_room_id;
        if ($user_room_id) {
            $users = User::where('user_room_id',$user_room_id)->paginate(5);
        }

        return view('User_management_Admin.user_index', ['users' => $users, 'user_rooms' => $user_rooms, 'user_room_id' => $user_room_id]);
    }
    
    /* Создание пользователя : страница с формой */
    public function create_user_page($room_id){
        $domain = $this->user_domain($room_id);
        return view('User_management_Admin.create_user_page', ['room_id' => $room_id, 'domain' => $domain]);
    }

    /* Создание пользователя : обработка POST запроса */
    public function create_user_post(Request $request, $room_id){
        $domain = $this->user_domain($room_id);
        // Создать пользователя с ролью "подписчик"
        $new_user = new User();
        $new_user->name = $request->login;
        $new_user->first_name = $request->first_name;
        $new_user->last_name = $request->last_name;
        $new_user->email = $request->login.$domain;
        $new_user->password = Hash::make($request->password);
        $new_user->role = 'user';
        $new_user->user_room_id = $room_id;
        $new_user->save();

        Mail::to($new_user->email)->send(new UserCreated($new_user, $request->password));

        // ? Вернуться на страницу списка пользователей
        return redirect('/admin_user_management/index');
    }

    /* Редактирование пользователя : страница */
    public function edit_user_page($user_id, $room_id=0){
        $domain = $this->user_domain($room_id);
        $user = User::find($user_id);
        return view('User_management_Admin.edit_user_page', ['user' => $user, 'room_id' => $room_id, 'domain' => $domain]);
    }

    /* Редактирование пользователя : обработка POST запроса */
    public function edit_user_post(Request $request, $room_id=0){
        $domain = $this->user_domain($room_id);
        $user = User::find($request->user_id);
        $user->first_name = $request->first_name;
        $user->name = $request->login;
        $user->last_name = $request->last_name;
        $user->email = $request->login.$domain;
        $user->save();
        return redirect('/admin_user_management/index');
    }

    /* Деактивировать пользователя */
    public function suspend_user($user_id){
        $user = User::find($user_id);
        $user->status = 'suspended';
        $user->save();

        return back();
    }

    /* Активировать пользователя */
    public function activate_user($user_id){
        $user = User::find($user_id);
        $user->status = 'active';
        $user->save();
        return back();
    }

    /* Сделать пользователя администратором */
    public function grant_admin_privileges($user_id){
        $user = User::find($user_id);
        $user->role = 'admin';
        $user->save();

        return back();
    }

    /* Забрать у пользователя администраторские права */
    public function remove_admin_privileges($user_id){
        $user = User::find($user_id);
        $user->role = 'user';
        $user->save();

        return back();
    }

    /* Работа с кабинетом */

    /* Список пользователей кабинета */
    public function show_room($room_id){
        $users = User::where('user_room_id', '=', $room_id)->paginate(5);
        $user_rooms = UserRoom::all();
        if (count($user_rooms) > 0 AND $room_id > 0){
            foreach ($user_rooms as $user_room) {
                if ($user_room->id === (int)$room_id) {
                    $room_name = $user_room->name;
                }
            }
        }

        return view('User_management_Admin.show_room', ['users' => $users,'room_id' => $room_id, 'room_name' => $room_name]);
    }

    /* Создание кабинета : страница с формой */
    public function create_room_page(){
        return view('User_management_Admin.create_room_page');
    }

    /* Создание кабинета : обработка POST запроса */
    public function create_room_post(Request $request){
        $new_room = new UserRoom();
        $new_room->name = $request->name;
        $new_room->domain = $request->domain;

        $new_room->save();

        // ? Вернуться на страницу списка пользователей
        return redirect('/admin_user_management/index');
    }

    /* Редактирование кабинета : страница */
    public function edit_room_page($room_id){
        $room = UserRoom::find($room_id);
        return view('User_management_Admin.edit_room_page', ['room' => $room]);
    }

    /* Редактирование кабинета : обработка POST запроса */
    public function edit_room_post(Request $request){
        $new_room = UserRoom::find($request->room_id);
        $new_room->name = $request->name;
        $new_room->domain = $request->domain;
        $new_room->save();
        return redirect('/admin_user_management/index');
    }

    /* Деактивировать кабинета */
    public function suspend_room($room_id){
        $room = UserRoom::find($room_id);
        $room->status = 'suspended';
        $room->save();
        $users = User::where('user_room_id', '=', $room_id)->get();
        if (count($users) > 0) {
            foreach ($users as $user) {
                $user->status = 'suspended';
                $user->save();
            }
        }
        

        return back();
    }

    /* Активировать кабинета */
    public function activate_room($room_id){
        $room = UserRoom::find($room_id);
        $room->status = 'active';
        $room->save();
        $users = User::where('user_room_id', '=', $room_id)->get();
        if (count($users) > 0) {
            foreach ($users as $user) {
                $user->status = 'active';
                $user->save();
            }
        }
        
        return back();
    }

}