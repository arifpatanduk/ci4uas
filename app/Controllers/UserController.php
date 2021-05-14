<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'active' => 'home'
		];
		return view('user/index', $data);
	}
}
