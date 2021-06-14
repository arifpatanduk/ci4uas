<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
	public function index()
	{
		// $users = new UserModel();
		// $users->withGroup()

		$data = [
			'title' => 'Kelola User',
			'active' => 'users'
		];
		return view('admin/users/kelola', $data);
	}
}
