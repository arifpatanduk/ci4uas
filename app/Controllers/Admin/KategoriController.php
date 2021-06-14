<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class KategoriController extends BaseController
{
	public function index()
	{
        $model = new KategoriModel();
		$data = [
			'title' => 'Kategori',
			'active' => 'kategori',
			'list' => $model->findAll()
		];

		return view('/admin/kategori/index', $data);
	}

    public function insert()
	{
		if ($this->request->isAJAX()) {

			$validasi = \Config\Services::validation();
			$valid = $this->validate([
				'jenis' => [
					'label' => 'Jenis',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'denda' => [
					'label' => 'Denda',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				]
			]);

			if (!$valid) {
				$pesan = [
					'error' => [
						'jenis'		=> $validasi->getError('jenis'),
						'denda'	    => $validasi->getError('denda'),
					]
				];
				echo json_encode($pesan);
			} else {
				$model = new KategoriModel();

				$input = [
					'jenis' => $this->request->getVar('jenis'),
					'denda' => $this->request->getVar('denda'),
				];

				$model->save($input);
				$pesan = [
					'sukses' => 'Data kategori berhasil diinput'
				];
				echo json_encode($pesan);
			}
		} else {
			exit('Request salah');
		}
	}

    public function edit($id)
	{
		$model = new KategoriModel();
		$data =
			[
				'title' => "Kategori",
				'active' => "kategori",
				'list' => $model->getDetail($id),
			];
		return view('admin/kategori/edit', $data);
	}

    public function update($id)
	{
		if ($this->request->isAJAX()) {

			$validasi = \Config\Services::validation();
			$valid = $this->validate([
				'jenis' => [
					'label' => 'Jenis',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'denda' => [
					'label' => 'Denda',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				]
			]);

			if (!$valid) {
				$pesan = [
					'error' => [
						'jenis'		=> $validasi->getError('jenis'),
						'denda'	    => $validasi->getError('denda'),
					]
				];
				echo json_encode($pesan);
			} else {
				$model = new KategoriModel();

				$input = [
					'jenis' => $this->request->getVar('jenis'),
					'denda' => $this->request->getVar('denda'),
				];
				$model->update($id, $input);
				$pesan = [
					'sukses' => 'Data kategori berhasil diupdate'
				];
				echo json_encode($pesan);
			}

		} else {
			exit('Request salah');
		}
		
	}

    public function delete($id)
	{
		if ($this->request->isAjax()) {
			$model = new KategoriModel();
			$model->delete($id);
			$pesan = [
				'sukses' => "Data dengan Id=".$id."berhasil dihapus"
			];
			echo json_encode($pesan);
		} else {
			exit('Data tidak dapat dihapus');
		}
	}
}
