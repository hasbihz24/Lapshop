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
        $count = count($laptopSearch);
        $data = [
            'laptop' => $laptopSearch,
            'count' => $count
        ];
        echo view('navbar');
        echo view('beliView', $data);
    }

    public function hapusKeranjang()
    {
        $request = service('request');
        $username = session()->get('username');
        $keranjangTampil = $this->keranjangModel->getKeranjang($username);
        $jsonData = $keranjangTampil['id_laptop'];
        $JsonDecode = json_decode($jsonData, true);

        $idUpdate = $keranjangTampil['id_keranjang'];
        $countKer  = count($JsonDecode);
        if ($countKer < 2) {
            $this->keranjangModel->delete($idUpdate);
            return redirect()->to('/Landing/pageBeli');
        } else {
            $checkboxValues[] = array();
            $i = 1;
            $j = 0;
            foreach ($JsonDecode as $data) {
                $checkHapus = $request->getPost('laptop-' . $j);
                if (!empty($checkHapus)) {
                    unset($JsonDecode[$i]);
                }
                $i++;
                $j++;
            }
            if ($j == 0) {
                session()->setFlashdata('error', 'Anda Belum Memilih Barang');
                return redirect()->to('/Landing/keranjang');
            }
            $h = 1;
            $jsonEncode = json_encode($JsonDecode);
            $JsonDecode = json_decode($jsonEncode, true);
            $json = 0;
            foreach ($JsonDecode as $data) {
                foreach ($data as $ker) {
                    $laptopTampil = $this->laptopModel->getLaptop($ker['slug']);
                    if (!empty($laptopTampil)) {
                        $laptopPesan = [
                            $h => [
                                $laptopTampil['slug'] => [
                                    'nama' => $laptopTampil['nama'],
                                    'harga' => $laptopTampil['harga'],
                                    'gambar' => $laptopTampil['gambar'],
                                    'slug' => $laptopTampil['slug']
                                ]
                            ]
                        ];
                        $json = $laptopPesan;
                        $h++;
                    }
                }
            }
            $jsonLaptop = json_encode($json);
            var_dump($jsonLaptop);
            $this->keranjangModel->update($idUpdate, [
                'id_laptop' => $jsonLaptop
            ]);
        }
    }
}
