<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\LaptopModel;
use App\Models\UserModel;
use App\Models\PesanModel;

class Landing extends BaseController
{
    protected $userModel;
    protected $laptopModel;
    protected $keranjangModel;
    protected $pesanModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->laptopModel = new LaptopModel();
        $this->keranjangModel = new KeranjangModel();
        $this->pesanModel = new PesanModel();
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
        $username = session()->get('username');
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
        $pesananDaftar = $this->pesanModel->getPesan($username);
        $keranjang = $pesananDaftar['daftar_laptop'];
        $data = [
            'user' => $this->userModel->getUser($username),
            'pesan' => $pesananDaftar,
            'daftar' => json_decode($keranjang,true)
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
        echo view('navbar');
        echo view('keranjangView', $data);
    }
}
