<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
	public function getDokumen() 
    {
        return $this->db->table('dokumen')
         ->join('ref_sub_kategori','ref_sub_kategori.id_sub_kategori = dokumen.id_sub_kategori')
         ->join('ref_kategori', 'ref_kategori.id_kategori = ref_sub_kategori.id_kategori')
         ->get()->getResultArray();
    }
    
    // Get cities
    public function getKategori(){

        return $this->db->table('ref_kategori')
         ->get()->getResultArray();

    }

    // Get City departments
    public function getSubKategori($id){

        return $this->db->table('ref_sub_kategori')->where('id_kategori', $id)
        ->get()->getResultArray();
    }
}
