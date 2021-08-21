<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKamar extends Model
{
    public function getDataKamar()
    {
        return $this->db->table('kamar')
            ->join('fasilitas', 'fasilitas.id_fasilitas=kamar.id_fasilitas')
            ->orderBy('id_kamar', 'ASC')
            ->get()
            ->getResultArray();
    }
    public function tambahKamar($data)
    {
        $this->db->table('kamar')
            ->insert($data);
    }
    public function editKamar($data)
    {
        $this->db->table('kamar')
            ->where('id_kamar', $data['id_kamar'])
            ->update($data);
    }
    public function deleteKamar($data)
    {
        $this->db->table('kamar')
            ->where('id_kamar', $data['id_kamar'])
            ->delete($data);
    }
}
