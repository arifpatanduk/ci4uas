<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class DocController extends BaseController
{
	protected $db;

	public function __construct()
	{
		$this->db      = \Config\Database::connect();
	}

	public function detail_guest($id)
	{
		$dokumen = $this->db->table('dokumen');
		$doc = $dokumen->where('id', $id)->get()->getResultArray();
		// dd($doc);
		$data = [
			'title' => 'Document',
			'active' => 'home',
			'dokumen' => $doc,
		];

		return view('/detail', $data);
	}

	public function detail_member($id)
	{
		$data = [
			'title' => 'Document',
			'active' => 'home',
		];

		return view('/user/detail', $data);
	}
}
