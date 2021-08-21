<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBooking extends Model
{
    public function getDataBooking()
    {
        return $this->db->table('booking')
            ->join('kamar', 'kamar.id_kamar=booking.id_kamar')
            ->join('fasilitas', 'fasilitas.id_fasilitas=kamar.id_fasilitas')
            ->orderBy('id_boking', 'ASC')
            ->get()
            ->getResultArray();
    }
    public function tambahBooking($data)
    {
        $this->db->table('booking')
            ->insert($data);
    }
    public function editBooking($data)
    {
        $this->db->table('booking')
            ->where('id_boking', $data['id_boking'])
            ->update($data);
    }
    public function deletebooking($data)
    {
        $this->db->table('booking')
            ->where('id_boking', $data['id_boking'])
            ->delete($data);
    }
    public function Stock($stock)
    {
        $this->db->table('kamar')
            ->where('id_kamar', $stock['id_kamar'])
            ->update($stock);
    }
    public function getStock($id_kamar)
    {
        return $this->db->table('kamar')
            ->where('id_kamar', $id_kamar)
            ->get()
            ->getResultArray();
    }
}
