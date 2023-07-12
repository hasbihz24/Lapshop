<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\LaptopModel;
use App\Models\PesanModel;
use App\Models\UserModel;

class Search extends BaseController
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

    public function searchBar()
    {
        $search = $this->request->getVar('search');
        $laptopSearch = $this->laptopModel->searchLaptop($search);
        $data = [
            'laptop' => $laptopSearch
        ];
        echo view('navbar');
        echo view('beliView', $data);
    }

    public function filter()
    {
    }
}
