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
	{;

		$model = new DokumenModel();
		$data = [
			'title' => 'Dokumen',
			'active' => 'dokumen',
			'kategori' => $model->getKategori(),
			'list' => $model->getDokumen()
		];
		return view('admin/dokumen', $data);
	}

	public function getSubKategori(){ 
		// POST data 
		$postData = $this->request->getGet('kat');
		
		$model = new DokumenModel();
		
		// get data 
		$data = $model->getSubKategori($postData);
		echo json_encode($data); 
		// dd($data);
	  }

}
