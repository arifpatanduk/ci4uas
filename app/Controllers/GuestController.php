<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GuestController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'active' => 'home'
		];
		return view('index', $data);
	}
}
