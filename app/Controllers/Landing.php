<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\LaptopModel;
use App\Models\UserModel;

class Landing extends BaseController
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
    public function index()
    {
        echo view('navbar');
        echo view('LandingView');
    }

    public function pageBeli()
    {
        $data = [
            'laptop' => $this->laptopModel->getLaptop()
        ];
        echo view('navbar');
        echo view('beliView', $data);
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function detail($slug)
    {
        session()->set([
            'slug' => $slug
        ]);
        $laptopDetail = $this->laptopModel->getLaptop($slug);
        $data = [
            'laptop' => $laptopDetail
        ];
        echo view('navbar');
        echo view('detailView', $data);
    }

    public function akun()
    {
        $username = session()->get('username');
        $data = [
            'user' => $this->userModel->getUser($username)
        ];
        echo view('navbar');
        echo view('akunView', $data);
    }

    public function keranjang()
    {
        $username = session()->get('username');
        $keranjangTampil = $this->keranjangModel->getKeranjang($username);   
        $jsonData = $keranjangTampil['id_laptop'];
        $dataArray = json_decode($jsonData, true);
        $data['keranjang'] = json_decode($jsonData, true);
        
        // foreach ($dataArray as $item) {
        // foreach ($item as $key => $data){
        //     echo 'ID: ' . $key . '<br>';
        //     echo 'Nama: ' . $data['nama'] . '<br>';
        //     echo 'Harga: ' . $data['harga'] . '<br>';
        //     echo 'Gambar: ' . $data['gambar'] . '<br>';
        //     echo 'Slug: ' . $data['slug'] . '<br>';
        //     echo '<br>';
        // }}
        
        echo view('navbar');
        echo view('keranjangView', $data);
    }
}

