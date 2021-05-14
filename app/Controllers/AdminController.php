<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'active' => 'home'
		];
		return view('admin/index', $data);
	}
}
