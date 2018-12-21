<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* Функция, которая подсчитывает число непрочитанных активных уведомлений */
    public function get_active_notifications_count(){
        return DB::table('notifications')
            ->where(
                [
                    [
                        'user_id', '=', $this->id
                    ]
                    ,
                    [
                        'seen', '=', false
                    ]
                ]
            )
            ->count();
    }

    /* Проверка, является ли пользователь администратором */
    // Функция из ветки yakymenko-lk
    public function isAdmin(){
        if($this->role == 'admin'){
            return true;
        } else {
            return false;
        }
    }

    /* Проверка, является ли пользователь активным */
    public function isActive(){
        if($this->status == 'active'){
            return true;
        } else {
            return false;
        }
    }

    /* Сделать пользователя админом */
    public function grant_admin_privileges(){
        $this->role = 'admin';
        $this->save();
    }

    /* Забрать права администратора */
    public function remove_admin_privileges(){
        $this->role = 'user';
        $this->save();
    }

    /* Деактивировать аккаунт */
    public function suspend_account(){
        $this->status = 'suspended';
        $this->save();
    }


    /* Активировать аккаунт */
    public function activate_account(){
        $this->status = 'active';
        $this->save();
    }

    /* Получить статус для отображения */
    public function getStatus(){
        if($this->isAdmin() && $this->isActive())
        {
            return 'Администратор';
        }
        else if ($this->isAdmin() && !$this->isActive()) {
            return 'Администратор (не активен)';
        } else if ($this->isActive()){
            return 'Активен';
        } else if (!$this->isActive()){
            return 'Деактивирован';
        }
    }

    // Функция из ветки postman
    public function is_admine()

    {
        if($this->admin)
        {

            return true;

        }

        return false;
    }

    public function indicators()
    {
        return $this->hasMany('App\IndicatorWatcher');
    }
}
