<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

class PeminjamanController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Peminjaman Dokumen',
			'active' => 'peminjaman',
		];

		return view('/user/peminjaman/index', $data);
	}

	public function detail_pinjam($id)
	{
		$docs = new DokumenModel();
		$doc = $docs->objectDokumen()->where('id', $id)->get()->getRow();

		$data = [
			'title' => 'Detail Peminjaman',
			'active' => 'peminjaman',
			'dokumen' => $doc,
		];

		return view('/user/peminjaman/detail', $data);
	}
}
