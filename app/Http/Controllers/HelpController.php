<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function help_index(){
        return view('help.help_index', ['active_sidebar_name' => 'help']);
    }
}
