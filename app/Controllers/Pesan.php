<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\LaptopModel;
use App\Models\UserModel;

class Pesan extends BaseController
{
    protected $userModel;
    protected $laptopModel;
    protected $keranjangModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->laptopModel = new LaptopModel();
        $this->keranjangModel = new KeranjangModel();
    }
    public function aksikeranjang()
    {
        $slug = session()->get('slug');
        echo $slug;
        $laptopTampil = $this->laptopModel->getLaptop($slug);
        $idKeranjang = random_int(1000, 9999);
        $username = session()->get('username');
        $status = 'belum dikirim';
        $jsonLaptop = null;
        $keranjangTampil = $this->keranjangModel->getKeranjang($username);
        if ($keranjangTampil == 0) {
            $laptopPesan = [
                '1' => [
                    $laptopTampil['slug'] => [
                        'nama' => $laptopTampil['nama'],
                        'harga' => $laptopTampil['harga'],
                        'gambar' => $laptopTampil['gambar'],
                        'slug' => $laptopTampil['slug']
                    ]
                ]
            ];
            $jsonLaptop = json_encode($laptopPesan);
            $this->keranjangModel->insert([
                'id_keranjang' => $idKeranjang,
                'id_laptop' => $jsonLaptop,
                'username' => $username,
                'status' => $status
            ]);
        } else {
            $idUpdate = $keranjangTampil['id_keranjang'];
            $jsonData = $keranjangTampil['id_laptop'];
            $JsonDecode = json_decode($jsonData, true);
            $laptopPesan = [
                $laptopTampil['slug'] => [
                    'nama' => $laptopTampil['nama'],
                    'harga' => $laptopTampil['harga'],
                    'gambar' => $laptopTampil['gambar'],
                    'slug' => $laptopTampil['slug']
                ]

            ];
            $JsonDecode[] = $laptopPesan;
            $updatedJson = json_encode($JsonDecode);
            $this->keranjangModel->update($idUpdate, [
                'id_laptop' => $updatedJson
            ]);
        }
        return redirect()->to('/Landing/keranjang');
    }

    public function index(){
        
    }
}
