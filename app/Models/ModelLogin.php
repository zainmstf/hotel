<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('login')
            ->where([
                'username' => $username,
                'password' => $password
            ])
            ->get()
            ->getRowArray();
    }
}
