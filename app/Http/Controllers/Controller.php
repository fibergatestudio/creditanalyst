<?php

namespace App\Http\Controllers;

use App;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        // Если пользователь залогинен, то задаём язык для приложения
        if(Auth::check()){
            App::setLocale(Auth::user()->preferred_language);
        }
    }
}
