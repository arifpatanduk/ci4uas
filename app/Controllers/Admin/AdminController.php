<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

include '../vendor/autoload.php';

class AdminController extends BaseController
{
	protected $client;
    protected $service;

    public function __construct(){
        // setting config untuk layanan akses ke google drive
        $this->client = new Google_Client();
        $this->client->setAuthConfig("../oauth-credentials.json");
        $this->client->addScope("https://www.googleapis.com/auth/drive");
        $this->service = new Google_Service_Drive($this->client);
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

	public function getSubKategori()
	{
		// POST data 
		$postData = $this->request->getGet('kat');

		$model = new DokumenModel();

		// get data 
		$data = $model->getSubKategori($postData);
		echo json_encode($data);
		// dd($data);
	}

	public function tambah(){
		// proses membaca token pasca login
        if (isset($_GET['code'])) {
            $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            // simpan token ke session
            $_SESSION['upload_token'] = $token;
        }

        if (empty($_SESSION['upload_token'])){
            // jika token belum ada, maka lakukan login via oauth
            $authUrl = $this->client->createAuthUrl();
            
            return redirect()->to($authUrl);
        } 
        else {
			$model = new DokumenModel();
            $data = [
                'title' => 'Dokumen',
                'active' => 'dokumen',
				'kategori' => $model->getKategori(),
            ];
            return view('admin/tambah', $data);
        }
	}

	public function insert()
	{
		if ($this->request->isAJAX()) {

			$validasi = \Config\Services::validation();
			$valid = $this->validate([
				'kategori' => [
					'label' => 'Kategori',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'subkategori' => [
					'label' => 'Sub Kategori',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'judul' => [
					'label' => 'Judul',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'penulis' => [
					'label' => 'Penulis',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'tahun' => [
					'label' => 'Tahun Publikasi',
					'rules' => 'required|numeric',
					'errors' => [
						'required'  => '{field} tidak boleh kosong',
						'numeric' => '{field} harus angka'
					]
				],
				'abstrak' => [
					'label' => 'Abstrak',
					'rules' => 'required|is_unique[users.email]',
					'errors' => [
						'required'  => '{field} tidak boleh kosong',
						'is_unique' => '{field} sudah terdaftar'
					]
				],
				'dokumen' => [
					'label' => 'Dokumen',
					'rules' => 'ext_in[dokumen,pdf]|max_size[dokumen,20000]',
					'errors' => [

						'ext_in'      => 'File {field} harus pdf',
						'max_size'    => 'File {field} maximal 20Mb'
					]
				]
			]);
			if (!$valid) {
				$pesan = [
					'error' => [
						'kategori'		=> $validasi->getError('kategori'),
						'subkategori'	=> $validasi->getError('subkategori'),
						'judul'			=> $validasi->getError('judul'),
						'penulis'		=> $validasi->getError('penulis'),
						'tahun'			=> $validasi->getError('tahun'),
						'abstrak'		=> $validasi->getError('abstrak'),
						'dokumen'		=> $validasi->getError('dokumen'),
					]
				];
				echo json_encode($pesan);
			} else {
				$dokumenModel = new DokumenModel();
				if ($this->request->getFile('dokumen')->getName() != '') {
					$dokumen = $this->request->getFile('dokumen');
					$namadokumen = $dokumen->getRandomName();

					// menggunakan token untuk mengakses google drive  
					$this->client->setAccessToken($_SESSION['upload_token']);
					// membaca token respon dari google drive
					$this->client->getAccessToken();
			
					// instansiasi obyek file yg akan diupload ke Google Drive
					$file = new Google_Service_Drive_DriveFile();
					// set nama file di Google Drive disesuaikan dg nama file aslinya
					$file->setName($namadokumen);
					// proses upload file ke Google Drive dg multipart
					$result = $this->service->files->create($file, array(
						'data' => file_get_contents($_FILES["dokumen"]["tmp_name"]),
						'mimeType' => 'application/octet-stream',
						'uploadType' => 'multipart'));

				}

				

				$input = [
					'judul' => $this->request->getVar('judul'),
					'nama_file' => $result->id,
					'abstrak' => $this->request->getVar('abstrak'),
					'penulis' => $this->request->getVar('penulis'),
					'tahun_publikasi' => $this->request->getVar('tahun'),
					'id_sub_kategori' => $this->request->getVar('subkategori'),
				];
				$dokumenModel->save($input);
				$pesan = [
					'sukses' => 'Data dokumen berhasil diinput'
				];
				echo json_encode($pesan);
			}
		} else {
			exit('Request salah');
		}
	}

	public function detail($id)
	{
		$model = new DokumenModel();
		$data =
			[
				'title' => "Dokumen",
				'active' => "dokumen",
				'list' => $model->getDetail($id),
			];
		return view('admin/detail', $data);
	}

	public function edit($id)
	{
		$model = new DokumenModel();
		$data =
			[
				'title' => "Dokumen",
				'active' => "dokumen",
				'kategori' => $model->getKategori(),
				'list' => $model->getDetail($id),
			];
		return view('admin/edit', $data);
	}

	public function update($id)
	{
		if ($this->request->isAJAX()) {

			$validasi = \Config\Services::validation();
			$valid = $this->validate([
				'kategori' => [
					'label' => 'Kategori',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'subkategori' => [
					'label' => 'Sub Kategori',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'judul' => [
					'label' => 'Judul',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'penulis' => [
					'label' => 'Penulis',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
				],
				'tahun' => [
					'label' => 'Tahun Publikasi',
					'rules' => 'required|numeric',
					'errors' => [
						'required'  => '{field} tidak boleh kosong',
						'numeric' => '{field} harus angka'
					]
				],
				'abstrak' => [
					'label' => 'Abstrak',
					'rules' => 'required|is_unique[users.email]',
					'errors' => [
						'required'  => '{field} tidak boleh kosong',
						'is_unique' => '{field} sudah terdaftar'
					]
				],
				'dokumen' => [
					'label' => 'Dokumen',
					'rules' => 'ext_in[dokumen,pdf]|max_size[dokumen,20000]',
					'errors' => [

						'ext_in'      => 'File {field} harus pdf',
						'max_size'    => 'File {field} maximal 20Mb'
					]
				]
			]);
			if (!$valid) {
				$pesan = [
					'error' => [
						'kategori'		=> $validasi->getError('kategori'),
						'subkategori'	=> $validasi->getError('subkategori'),
						'judul'			=> $validasi->getError('judul'),
						'penulis'		=> $validasi->getError('penulis'),
						'tahun'			=> $validasi->getError('tahun'),
						'abstrak'		=> $validasi->getError('abstrak'),
						'dokumen'		=> $validasi->getError('dokumen'),
					]
				];
				echo json_encode($pesan);
			} else {
				$dokumenModel = new DokumenModel();
				$id = $dokumenModel->find($id);
				if ($this->request->getFile('dokumen')->getName() != '') {
					$dokumen = $this->request->getFile('dokumen');
					$namadokumen = $dokumen->getRandomName();
					
					// menggunakan token untuk mengakses google drive  
					$this->client->setAccessToken($_SESSION['upload_token']);
					// membaca token respon dari google drive
					$this->client->getAccessToken();
			
					// instansiasi obyek file yg akan diupload ke Google Drive
					$file = new Google_Service_Drive_DriveFile();
					// set nama file di Google Drive disesuaikan dg nama file aslinya
					$file->setName($namadokumen);
					// proses upload file ke Google Drive dg multipart
					$result = $this->service->files->create($file, array(
						'data' => file_get_contents($_FILES["dokumen"]["tmp_name"]),
						'mimeType' => 'application/octet-stream',
						'uploadType' => 'multipart'));

					$namadokumen = $result->id;

				} else {
					$namadokumen = $this->request->getVar('file_old');
				}

				$input = [
					'judul' => $this->request->getVar('judul'),
					'nama_file' => $namadokumen,
					'abstrak' => $this->request->getVar('abstrak'),
					'penulis' => $this->request->getVar('penulis'),
					'tahun_publikasi' => $this->request->getVar('tahun'),
					'id_sub_kategori' => $this->request->getVar('subkategori'),
				];
				$dokumenModel->update($id, $input);
				$pesan = [
					'sukses' => 'Data dokumen berhasil diupdate'
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
			$model = new DokumenModel();
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
