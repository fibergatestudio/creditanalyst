<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

class IndexController extends AdminController
{
    public function index(){
        $title = 'Система для кредитного аналитика';
        return view('admin.index', ['title' => $title]);
    }
}
