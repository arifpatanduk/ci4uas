<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

class UserController extends BaseController
{
	public function index()
	{
		// d($this->request->getVar());
		$keyword = $this->request->getVar();

		$db      = \Config\Database::connect();
		$dokumen = $db->table('dokumen');
		$doc = $dokumen->orderBy('created_at', 'DESC')->limit(4)->get()->getResultArray();


		$data = [
			'title' => 'Home',
			'active' => 'home',
			'dokumen' => $doc
		];
		return view('index', $data);
	}
}
