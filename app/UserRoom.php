<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoom extends Model
{
    protected $table = 'user_rooms';

    
    /* Проверка, является ли кабинет активным */
    public function isActiveRoom(){
        if($this->status == 'active'){
            return true;
        } else {
            return false;
        }
    }


    /* Получить статус для отображения */
    public function getStatusRoom(){
        if ($this->isActiveRoom()){
            return 'Активен';
        } else if (!$this->isActiveRoom()){
            return 'Деактивирован';
        }
    }
}
