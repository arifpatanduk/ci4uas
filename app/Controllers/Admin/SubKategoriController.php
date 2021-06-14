<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SubKategoriModel;

class SubKategoriController extends BaseController
{
	public function index()
	{
        $model = new SubKategoriModel();
		$data = [
			'title' => 'Sub Kategori',
			'active' => 'subkategori',
            'kategori' => $model->getKategori(),
			'list' => $model->getAllData()
		];

		return view('/admin/subkategori/index', $data);
	}

    public function insert()
	{
		if ($this->request->isAJAX()) {

			$validasi = \Config\Services::validation();
			$valid = $this->validate([
				'nama' => [
					'label' => 'Nama',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'kategori' => [
					'label' => 'Kategori',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				]
			]);

			if (!$valid) {
				$pesan = [
					'error' => [
						'nama'		=> $validasi->getError('nama'),
						'kategori'	=> $validasi->getError('kategori'),
					]
				];
				echo json_encode($pesan);
			} else {
				$model = new SubKategoriModel();
                
				$input = [
					'nama'      => $this->request->getVar('nama'),
					'id_kategori'  => $this->request->getVar('kategori'),
				];

				$model->save($input);
				$pesan = [
					'sukses' => 'Data Sub kategori berhasil diinput'
				];
				echo json_encode($pesan);
			}
		} else {
			exit('Request salah');
		}
	}

    public function edit($id)
	{
		$model = new SubKategoriModel();
		$data =
			[
				'title' => "Sub Kategori",
				'active' => "subkategori",
                'kategori' => $model->getKategori(),
				'list' => $model->getDetail($id),
			];
		return view('admin/subkategori/edit', $data);
	}

    public function update($id)
	{
		if ($this->request->isAJAX()) {

			$validasi = \Config\Services::validation();
			$valid = $this->validate([
				'nama' => [
					'label' => 'Nama',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'kategori' => [
					'label' => 'Kategori',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				]
			]);

			if (!$valid) {
				$pesan = [
					'error' => [
						'nama'		=> $validasi->getError('nama'),
						'kategori'	=> $validasi->getError('kategori'),
					]
				];
				echo json_encode($pesan);
			} else {
				$model = new SubKategoriModel();

				$input = [
					'nama' => $this->request->getVar('nama'),
					'id_kategori' => $this->request->getVar('kategori'),
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
			$model = new SubKategoriModel();
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
