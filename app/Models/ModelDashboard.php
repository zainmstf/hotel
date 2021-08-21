<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDashboard extends Model
{
    public function getDataFasilitas()
    {
        return $this->db->table('fasilitas')
            ->orderBy('id_fasilitas', 'ASC')
            ->get()
            ->getResultArray();
    }
    public function tambahFasilitas($data)
    {
        $this->db->table('fasilitas')
            ->insert($data);
    }
    public function editFasilitas($data)
    {
        $this->db->table('fasilitas')
            ->where('id_fasilitas', $data['id_fasilitas'])
            ->update($data);
    }
    public function deleteFasilitas($data)
    {
        $this->db->table('fasilitas')
            ->where('id_fasilitas', $data['id_fasilitas'])
            ->delete($data);
    }
}
