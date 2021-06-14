<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokumenModel;

class HomeController extends BaseController
{
	public function index()
	{
		// d($this->request->getVar());
		$docModel = new DokumenModel();

		$keyword = $this->request->getVar('keyword');
		$kategori = $this->request->getVar('kategori');
		// dd($kategori);

		if ($keyword) {
			$doc = $docModel->search($keyword, $kategori)->get()->getResultArray();
		} else {

			// dokumen terbaru
			// $db = \Config\Database::connect();
			// $doc = $db->table('dokumen')->orderBy('created_at', 'DESC')->limit(4)->get()->getResultArray();
			$doc = $docModel->objectDokumen()->orderBy('created_at', 'DESC')->limit(4)->get()->getResultArray();
		}

		$data = [
			'title' => 'Home | SIMAD - PTIK',
			'active' => 'home',
			'dokumen' => $doc,
			'kategori' => $docModel->getKategori()
		];
		return view('index', $data);
	}
}
