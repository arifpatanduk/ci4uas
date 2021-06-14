<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKategoriModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'ref_sub_kategori';
    protected $primaryKey           = 'id_sub_kategori';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nama', 'id_kategori'];

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


    // Get kategori dan sub kategori
    public function getAllData()
    {
        return $this->db->table('ref_sub_kategori')
            ->join('ref_kategori', 'ref_kategori.id_kategori = ref_sub_kategori.id_kategori')
            ->get()->getResultArray();
    }

    // Get kategori
    public function getKategori()
    {
        return $this->db->table('ref_kategori')
            ->get()->getResultArray();
    }

    // Get detail sub kategori
    public function getDetail($id)
    {
        return $this->db->table('ref_sub_kategori')
            ->join('ref_kategori', 'ref_kategori.id_kategori = ref_sub_kategori.id_kategori')
            ->where('id_sub_kategori', $id)
            ->get()->getFirstRow();
    }

}
