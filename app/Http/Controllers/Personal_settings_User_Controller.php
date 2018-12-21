<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;


class Personal_settings_User_Controller extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return view('Personal_settings_User.personal_settings_user_index', ['user' => $user, 'active_sidebar_name' => 'settings']);
    }

    public function edit_settings(Request $request){
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $user->name = $request->first_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();
        return back();
    }
}
