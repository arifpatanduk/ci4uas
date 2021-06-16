<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\DokumenModel;
use App\Models\PeminjamanModel;
use TCPDF;

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
		$validasi = \Config\Services::validation();
		// if (!$this->validate(['tgl_pinjam' => 'required'])) {
		// 	return redirect('/user/doc/' . $id)->withInput()->with('errors', service('validation')->getErrors());
		// }

		$valid = $this->validate([
			'tgl_pinjam' => [
				'label' => 'Tanggal Pinjam',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			]
		]);

		if (!$valid) {
			$pesan = [
				'error' => [
					'tgl_pinjam'     => $validasi->getError('tgl_pinjam')
				]
			];

			echo json_encode($pesan);

		} else {
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

			$pesan = [
				'sukses' => 'Peminjaman sukses silahkan datang ke kampus dan membawa bukti peminjaman'
			];
			echo json_encode($pesan);

		}

	}

	public function tiket($id)
	{
		$peminjaman = new PeminjamanModel();
		$pinjam = $peminjaman->where('id_peminjaman', $id)->get()->getRow();

		$docs = new DokumenModel();
		$doc = $docs->objectDokumen()->where('id', $pinjam->id_dokumen)->get()->getRow();

		$data = [
			'doc' => $doc,
			'pinjam' => $pinjam,
		];

		$html = view('/user/peminjaman/tiket', $data);

		$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('SIMAD - PTIK');
		$pdf->SetTitle('Peminjaman');
		$pdf->SetSubject('Tiket');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output('peminjaman-simad-ptik.pdf', 'I');
	}
}
