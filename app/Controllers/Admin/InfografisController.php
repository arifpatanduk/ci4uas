<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class InfografisController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Infografis',
			'active' => 'infografis',
		];

		return view('/admin/infografis', $data);
	}
}
