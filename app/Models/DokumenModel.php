<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'dokumen';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['judul', 'nama_file', 'abstrak', 'penulis', 'tahun_publikasi', 'id_sub_kategori', 'status_tersedia'];
    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function getDokumen()
    {
        return $this->db->table('dokumen')
            ->join('ref_sub_kategori', 'ref_sub_kategori.id_sub_kategori = dokumen.id_sub_kategori')
            ->join('ref_kategori', 'ref_kategori.id_kategori = ref_sub_kategori.id_kategori')
            ->get()->getResultArray();
    }

    // Get kategori
    public function getKategori()
    {

        return $this->db->table('ref_kategori')
            ->get()->getResultArray();
    }

    // Get sub kategori
    public function getSubKategori($id)
    {

        return $this->db->table('ref_sub_kategori')->where('id_kategori', $id)
            ->get()->getResultArray();
    }

    public function search($keyword, $kategori)
    {
        if ($kategori == "0") {
            return $this->db->table('dokumen')
                ->join('ref_sub_kategori', 'ref_sub_kategori.id_sub_kategori = dokumen.id_sub_kategori')
                ->join('ref_kategori', 'ref_kategori.id_kategori = ref_sub_kategori.id_kategori')
                ->like('judul', $keyword);
        } else {
            return $this->db->table('dokumen')
                ->join('ref_sub_kategori', 'ref_sub_kategori.id_sub_kategori = dokumen.id_sub_kategori')
                ->join('ref_kategori', 'ref_kategori.id_kategori = ref_sub_kategori.id_kategori')
                ->like('dokumen.judul', $keyword)
                ->like('ref_kategori.id_kategori', $kategori);
        }
    }

    public function objectDokumen()
    {
        return $this->db->table('dokumen')
            ->join('ref_sub_kategori', 'ref_sub_kategori.id_sub_kategori = dokumen.id_sub_kategori')
            ->join('ref_kategori', 'ref_kategori.id_kategori = ref_sub_kategori.id_kategori');
    }

    // Get detail dokumen
    public function getDetail($id)
    {

        return $this->db->table('dokumen')->where('id', $id)
            ->join('ref_sub_kategori', 'ref_sub_kategori.id_sub_kategori = dokumen.id_sub_kategori')
            ->join('ref_kategori', 'ref_kategori.id_kategori = ref_sub_kategori.id_kategori')
            ->get()->getFirstRow();
    }

    // Get nama file dokumen
    public function getFilename($id)
    {

        return $this->db->table('dokumen')->select('nama_file')->where('id', $id)
            ->get()->getResultArray();
    }

    public function getInfo(){
        return $this->db->table('dokumen')->selectCount('dokumen.id_sub_kategori')->select('ref_kategori.jenis')
            ->join('ref_sub_kategori', 'ref_sub_kategori.id_sub_kategori = dokumen.id_sub_kategori')
            ->join('ref_kategori', 'ref_kategori.id_kategori = ref_sub_kategori.id_kategori')
            ->groupBy('jenis')
            ->get()->getResultArray();
    }

    public function getInfoPinjam(){
        return $this->db->table('dokumen')->selectCount('dokumen.id_sub_kategori')->select('ref_kategori.jenis')
            ->join('ref_sub_kategori', 'ref_sub_kategori.id_sub_kategori = dokumen.id_sub_kategori')
            ->join('ref_kategori', 'ref_kategori.id_kategori = ref_sub_kategori.id_kategori')
            ->where('status_tersedia', 'Tidak Tersedia')
            ->groupBy('jenis')
            ->get()->getResultArray();
    }
}
