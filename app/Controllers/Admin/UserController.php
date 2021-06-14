<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
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

	public function changeStatus()
	{
		$user = new UserModel;
		$id	= $this->request->getVar('user_id');
		$active = $this->request->getVar('status');

		$input = [
			'id' => $id,
			'active' => $active
		];

		$user
			->where('id', $id)
			->set(['active' => $active])
			->update();

		// $user->save($input);

		$pesan = [
			'success' => 'Status active berhasil diupdate.',
			'id' => $id,
			'active' => $active,
		];
		echo json_encode($pesan);
	}
}
