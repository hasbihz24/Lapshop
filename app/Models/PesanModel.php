<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesan';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_pesan', 'daftar_laptop', 'tgl_beli', 'total', 'no_pembayaran', 'username'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPesan($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }

        return $this->where(['username' => $username])->first();
    }
}
