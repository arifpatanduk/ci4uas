<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Myth\Auth\Authorization\GroupModel;

class UserController extends BaseController
{
	public function index()
	{
		$users = new UserModel();


		$data = [
			'title' => 'Kelola User',
			'active' => 'users',
			'users' => $users->getUsersWithGroup()
		];
		return view('admin/users/kelola', $data);
	}
}
