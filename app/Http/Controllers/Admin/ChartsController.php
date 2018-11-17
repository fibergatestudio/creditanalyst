<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

class ChartsController extends AdminController
{
	public function index(){
		$title = 'Графики';
		return view('admin.charts', ['title' => $title]);
	}

	public function save_img_file(Request $request){
		$image = fopen($request->img, 'r');
		file_put_contents("fileName.png", $image);
		fclose($image);
		$data = 'Файл сохранен!';

		return $data;
	}

}
