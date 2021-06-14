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
		$user = new UserModel();
		$id	= $this->request->getVar('user_id');
		$active = $this->request->getVar('status');

		$user->update($id, ['active' => $active]);

		$pesan = [
			'success' => 'Status active berhasil diupdate.',
			'id' => $id
		];
		echo json_encode($pesan);
	}
}
