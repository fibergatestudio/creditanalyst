<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    //

    // Функция, которая обеспечивает выход из личного кабинета
    public function user_logout(){
        Auth::logout();
        return redirect('/');
    }
}
