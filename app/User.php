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

    public function is_admine()

    {
        if($this->admin)
        {

            return true;

        }

        return false;
    }
}
