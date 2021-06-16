<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use App\Models\PeminjamanModel;

class PeminjamanController extends BaseController
{
	public function __construct()
	{

		// create date now
		$now = date_create(date("Y-m-d H:i:s"));

		// get data peminjaman
		$peminjaman = new PeminjamanModel();

		// get peminjaman belum kembali
		$pemdoc = $peminjaman->withDocumentAndKategori()->where('tgl_kembali', null)->get()->getResultArray();

		foreach ($pemdoc as $pinjam) {

			// create & get deadline
			$deadline = date_create($pinjam['deadline']);

			// get besaran denda from kategori
			$denda = $pinjam['denda'];

			if ($now > $deadline) {

				// set different between deadline & now
				$diff = date_diff($deadline, $now);

				// set jumlah hari late
				$jml_late = (int)$diff->format("%a");

				// set total denda  
				$total_denda = $denda * $jml_late;

				// update database
				$peminjaman->set('is_late', 1);
				$peminjaman->set('jml_late', $jml_late);
				$peminjaman->set('total_denda', $total_denda);
				$peminjaman->where('id_peminjaman', $pinjam['id_peminjaman']);
				$peminjaman->update();
			}
		}
	}

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
		$peminjaman = new PeminjamanModel();
		$pinjam = $peminjaman->where('id_peminjaman', $id)->get()->getRow();

		$docs = new DokumenModel();
		$doc = $docs->objectDokumen()->where('id', $pinjam->id_dokumen)->get()->getRow();

		$data = [
			'title' => 'Detail Peminjaman',
			'active' => 'peminjaman',
			'doc' => $doc,
			'pinjam' => $pinjam,
		];

		return view('/admin/peminjaman/detail', $data);
	}

	public function konfirmasi($token_pinjam)
	{
		if ($this->request->isAjax()) {
			$peminjaman = new PeminjamanModel();
			$pinjam = $peminjaman->where('token_pinjam', $token_pinjam)->get()->getRow();

			$id_pinjam = $pinjam->id_peminjaman;
			$tgl_kembali = date("Y-m-d H:i:s");

			// update table peminjaman
			$peminjaman->set('isAmbil', 1);
			$peminjaman->where('id_peminjaman', $id_pinjam);
			$peminjaman->update();

			$pesan = [
				'sukses' => 'Dokumen dengan token peminjaman ' . $token_pinjam . ' terambil.'
			];

			echo json_encode($pesan);
		} else {
			exit('Dokumen tidak dapat dikembalikan');
		}
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
			$dokumen->set('status_tersedia', 'Tersedia');
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

	public function history()
	{
		$peminjaman = new PeminjamanModel();
		$peminjaman = $peminjaman->withDocument()->where('tgl_kembali !=', null)->orderBy('tgl_pinjam', 'ASC')->get()->getResultArray();

		$data = [
			'title' => 'History Peminjaman Dokumen',
			'active' => 'history',
			'peminjaman' => $peminjaman,
		];

		return view('/admin/peminjaman/history/history', $data);
	}

	public function detail_history($id)
	{
		$peminjaman = new PeminjamanModel();
		$pinjam = $peminjaman->where('id_peminjaman', $id)->get()->getRow();

		$docs = new DokumenModel();
		$doc = $docs->objectDokumen()->where('id', $pinjam->id_dokumen)->get()->getRow();

		$data = [
			'title' => 'Detail History Peminjaman',
			'active' => 'history',
			'doc' => $doc,
			'pinjam' => $pinjam,
		];

		return view('/admin/peminjaman/history/detail', $data);
	}
}
