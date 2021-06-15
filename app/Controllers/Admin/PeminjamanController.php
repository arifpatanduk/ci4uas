<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use App\Models\PeminjamanModel;

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


	public function getData()
	{
		if ($this->request->isAjax()) {
			$peminjaman = new PeminjamanModel();
			$peminjaman = $peminjaman->withDocumentAndUsers()->where('tgl_kembali', null)->get()->getResultArray();
			$data = [
				'peminjaman' => $peminjaman
			];

			$hasil = [
				'data' => view('admin/peminjaman/list', $data)
			];
			echo json_encode($hasil);
		} else {
			exit('Data tidak dapat diload');
		}
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

	public function kembali($token_pinjam)
	{
		if ($this->request->isAjax()) {
			$peminjaman = new PeminjamanModel();
			$pinjam = $peminjaman->where('token_pinjam', $token_pinjam)->get()->getRow();

			$id_pinjam = $pinjam->id_peminjaman;
			$tgl_kembali = date("Y-m-d H:i:s");

			// update table peminjaman
			$peminjaman->set('tgl_kembali', $tgl_kembali);
			$peminjaman->where('id_peminjaman', $id_pinjam);
			$peminjaman->update();

			// update table dokumen
			$dokumen = new DokumenModel();
			$dokumen->set('status', 'Tersedia');
			$dokumen->where('id', $pinjam->id_dokumen);
			$dokumen->update();

			$pesan = [
				'sukses' => 'Peminjaman ' . $token_pinjam . ' berhasil dikembalikan.'
			];

			echo json_encode($pesan);
		} else {
			exit('Dokumen tidak dapat dikembalikan');
		}
	}
}
