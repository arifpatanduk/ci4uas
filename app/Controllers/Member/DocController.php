<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use App\Models\PeminjamanModel;

class DocController extends BaseController
{
	protected $db;

	public function __construct()
	{
		$this->db      = \Config\Database::connect();
	}

	public function detail_guest($id)
	{
		$docs = new DokumenModel();
		$doc = $docs->objectDokumen()->where('id', $id)->get()->getRow();


		$data = [
			'title' => 'Document',
			'active' => 'home',
			'dokumen' => $doc,
		];

		return view('/detail', $data);
	}

	public function detail_member($id)
	{
		$docs = new DokumenModel();
		$doc = $docs->objectDokumen()->where('id', $id)->get()->getRow();

		$peminjaman = new PeminjamanModel();
		$pinjam = $peminjaman->where('id_user', user_id())->where('id_dokumen', $id)->get()->getRow();
		$jml_pinjam = count($peminjaman->where('id_user', user_id())->where('tgl_kembali', null)->get()->getResultArray());

		$data = [
			'title' => 'Document',
			'active' => 'home',
			'dokumen' => $doc,
			'pinjam' => $pinjam,
			'jml_pinjam' => $jml_pinjam,
		];

		return view('/user/detail', $data);
	}
}
