<?php

namespace App\Models;

use CodeIgniter\Model;

class LaptopModel extends Model
{
    protected $table = 'laptop';
    protected $primaryKey = 'id_laptop';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_laptop', 'nama', 'merek', 'jenis','jumlah','harga','gambar', 'slug', 'deskripsi'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getLaptop($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function searchLaptop($search)
    {
        return $this->like('nama', $search)->findAll();
    }
}
