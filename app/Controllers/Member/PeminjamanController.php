<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use App\Models\PeminjamanModel;

class PeminjamanController extends BaseController
{
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
		$dokumen->update($id, ['status' => 'Tidak Tersedia']);

		session()->setFlashData('pinjam', 'Peminjaman Berhasil dikirim');

		return redirect('user/peminjaman');
	}
}
