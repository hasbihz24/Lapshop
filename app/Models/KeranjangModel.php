<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_keranjang', 'id_laptop', 'username', 'status'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getKeranjang($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }
       
        return $this->where(['username' => $username])->first();
    }
    public function countKeranjang($username = false)
    {
        $this->where(['username' => $username])->first();
        return $this->countAllResults();
    }

    public function getJsonData($username = false){
        return $this->where(['username' => $username])->findColumn('id_laptop');
    }
}
