<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

class InfografisController extends BaseController
{
	public function index()
	{
		$model = new DokumenModel();
		$data = [
			'title' => 'Infografis',
			'active' => 'infografis',
			'list' => $model->getInfo(),
			'list2'=> $model->getInfoPinjam()

		];

		return view('/admin/infografis', $data);
	}
}
