<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

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

		$data = [
			'title' => 'Document',
			'active' => 'home',
			'dokumen' => $doc,
		];

		return view('/user/detail', $data);
	}
}
