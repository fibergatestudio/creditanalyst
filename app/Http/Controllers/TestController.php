<?php

namespace App\Http\Controllers;

use App;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function test(){
		
		$locale = Auth::user()->preferred_language;
		App::setLocale($locale);
		
		return view('test.test');
	}
}
