<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

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

	public function dokumen()
	{
		$model = new DokumenModel();
		$data = [
			'title' => 'Dokumen',
			'active' => 'dokumen',
			'list' => $model->getDokumen()
		];
		return view('admin/dokumen', $data);
	}
}
