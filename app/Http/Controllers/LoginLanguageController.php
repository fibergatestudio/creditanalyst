<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginLanguageController extends Controller
{
    public function login_page_ukr(){

        // $language = 'ua';

        // DB::table('users')
        // ->where('id', '=', $employee_id)
        // ->update(['balance' => $new_employee_balance]);
        
        return view('auth.login_ukr');
    }

    public function login_page_en(){

        // $language = 'ua';

        // DB::table('users')
        // ->where('id', '=', $employee_id)
        // ->update(['balance' => $new_employee_balance]);
        
        return view('auth.login_en');
    }
}
