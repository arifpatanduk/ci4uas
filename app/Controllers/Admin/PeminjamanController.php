<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

class PeminjamanController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Kelola Peminjaman',
			'active' => 'peminjaman',
		];

		return view('/admin/peminjaman/index', $data);
	}

	public function detail($id)
	{
		$docs = new DokumenModel();
		$doc = $docs->objectDokumen()->where('id', $id)->get()->getRow();

		$data = [
			'title' => 'Detail Peminjaman',
			'active' => 'peminjaman',
			'dokumen' => $doc,
		];

		return view('/admin/peminjaman/detail', $data);
	}
}
