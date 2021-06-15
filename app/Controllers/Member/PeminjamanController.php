<?php

namespace App\Controllers\Member;

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
		$peminjaman = new PeminjamanModel();
		$peminjaman = $peminjaman->withDocument()->where('id_user', user_id())->orderBy('tgl_pinjam', 'ASC')->get()->getResultArray();

		$data = [
			'title' => 'Peminjaman Dokumen',
			'active' => 'peminjaman',
			'peminjaman' => $peminjaman,
		];

		return view('/user/peminjaman/index', $data);
	}

	public function detail_pinjam($id)
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

		return view('/user/peminjaman/detail', $data);
	}

	public function pinjam($id)
	{
		if (!$this->validate(['tgl_pinjam' => 'required'])) {
			return redirect('/user/doc/' . $id)->withInput()->with('errors', service('validation')->getErrors());
		}

		$tgl_pinjam = date('Y-m-d H:i:s', strtotime($this->request->getVar('tgl_pinjam')));
		$deadline = date('Y-m-d H:i:s', strtotime('+3 days 17 hours', strtotime($this->request->getVar('tgl_pinjam'))));
		$token_pinjam = strtoupper(user()->nama[0] . user()->nama[1]) . user_id() . '-' . strtotime($this->request->getVar('tgl_pinjam'));

		// insert to peminjaman
		$peminjaman = new PeminjamanModel();
		$input = [
			'tgl_pinjam' => $tgl_pinjam,
			'deadline' => $deadline,
			'token_pinjam' => $token_pinjam,
			'id_dokumen' => $id,
			'id_user' => user_id(),
		];
		$peminjaman->save($input);

		// // update status on dokumen
		$dokumen = new DokumenModel();
		$dokumen->update($id, ['status_tersedia' => 'Tidak Tersedia']);

		session()->setFlashData('pinjam', 'Peminjaman Berhasil dikirim');

		return redirect('user/peminjaman');
	}
}
