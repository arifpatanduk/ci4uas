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
                    $dokumen->move(ROOTPATH . 'public/dokumen', $namadokumen);
                }

                $input = [
                    'judul' => $this->request->getVar('judul'),
					'nama_file' => $namadokumen,
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

	public function update()
	{
		
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
			$id = $this->request->getVar('id');
			if ($this->request->getFile('dokumen')->getName() != '') {
				$dokumen = $this->request->getFile('dokumen');
				$namadokumen = $dokumen->getRandomName();
				$dokumen->move(ROOTPATH . 'public/dokumen', $namadokumen);
			}else
			{
				$namadokumen = $dokumenModel->getFilename($id);
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
				'sukses' => 'Data dokumen berhasil diinput'
			];
			echo json_encode($pesan);
		}

        return view('admin/edit', $data);
	}


}
