<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
	protected $userModel;

	public function __construct()
	{
		$this->userModel = new \Myth\Auth\Models\UserModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Profile',
			'active' => 'profile',
		];

		return view('/user/profile', $data);
	}

	public function update()
	{
		// dd($this->request->getPost());
		$rules = [
			'nama' => 'required',
			'nim' => 'required|is_unique[users.nim,email,{email}]',
			'no_hp' => 'required|numeric',
			'alamat' => 'required',
		];

		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
		}

		$input = [
			'nama' => $this->request->getVar('nama'),
			'nim' => $this->request->getVar('nim'),
			'no_hp' => $this->request->getVar('no_hp'),
			'alamat' => $this->request->getVar('alamat')
		];
		$this->userModel->update(user_id(), $input);

		session()->setFlashData('update-profile', 'Data Profile berahasil disimpan.');

		return redirect('user/profile');
	}
}
