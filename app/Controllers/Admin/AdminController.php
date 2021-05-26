<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Kelola User',
			'active' => 'users'
		];
		return view('admin/kelola_user', $data);
	}
}
