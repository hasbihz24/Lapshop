<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\LaptopModel;
use App\Models\PesanModel;
use App\Models\UserModel;

class Pesan extends BaseController
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
    public function aksikeranjang()
    {

        $slug = session()->get('slug');
        $laptopTampil = $this->laptopModel->getLaptop($slug);
        if ($laptopTampil['jumlah'] == 0) {
            session()->setFlashdata('sudah_ada', 'Barang Habis');
            return redirect()->to('/' . $slug);
        }
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
            $keranjangTampil = $this->keranjangModel->getKeranjang($username);
            $jsonData = $keranjangTampil['id_laptop'];
            $dataArray = json_decode($jsonData, true);
            foreach ($dataArray as $item) {
                foreach ($item as $key => $data) {
                    if ($data['slug'] == $slug) {
                        session()->setFlashdata('sudah_ada', 'Sudah Ada Di Keranjang');
                        return redirect()->to('/' . $slug);
                        break;
                    }
                }
            }
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

    public function index()
    {
        $request = service('request');
        $pesan = $this->request->getPost('btnPesan');
        $hapus = $this->request->getPost('btnHapus');

        if (!empty($pesan)) {
            $username = session()->get('username');
            $keranjangTampil = $this->keranjangModel->getKeranjang($username);
            $jsonData = $keranjangTampil['id_laptop'];
            $JsonDecode = json_decode($jsonData, true);
            $checkboxValues[] = array();
            $i = 0;
            $j = 0;
            $totalLaptop = 0;
            foreach ($JsonDecode as $data) {
                if ($request->getPost('laptop-' . $i)) {
                    $checkboxValues[$j] = $request->getPost('laptop-' . $i);
                    $laptopTampil = $this->laptopModel->getLaptop($checkboxValues[$j]);
                    if ($laptopTampil['jumlah'] == 0) {
                        session()->setFlashdata('error', 'Barang Habis');
                        return redirect()->to('/Landing/keranjang');
                    }
                    $laptopPesan = [
                        $checkboxValues[$j] => [
                            'nama' => $laptopTampil['nama'],
                            'harga' => $laptopTampil['harga'],
                            'gambar' => $laptopTampil['gambar'],
                            'slug' => $checkboxValues[$j]
                        ]

                    ];
                    $updatedJson[] = $laptopPesan;
                    $totalLaptop += $laptopTampil['harga'];
                    $j++;
                }
                $i++;
            }
            if ($j == 0) {
                session()->setFlashdata('error', 'Anda Belum Memilih Barang');
                return redirect()->to('/Landing/keranjang');
            }

            $id_pesan = random_int(1000, 9999);
            $id_pesan2 = random_int(100000, 999999);
            $no_pemb = 'NPM' . $id_pesan2;
            var_dump($updatedJson);
            $jsonEncode = json_encode($updatedJson);
            $today = new \DateTime();
            $tglBeli = $today->format('Y-m-d');
            $pesanBaca = $this->pesanModel->getPesan($username);
            if ($pesanBaca) {
                session()->setFlashdata('error', 'Anda Sudah Memesan');
                return redirect()->to('/Landing/keranjang');
            } else {
                $this->pesanModel->insert([
                    'id_pesan' => $id_pesan,
                    'daftar_laptop' => $jsonEncode,
                    'tgl_beli' => $tglBeli,
                    'total' => $totalLaptop,
                    'no_pembayaran' => $no_pemb,
                    'username' => $username
                ]);
            }
            return redirect()->to('/Landing/akun');
        } elseif (!empty($hapus)) {
            $searchObj = new Search();
            $searchObj->hapusKeranjang();

            return redirect()->to('/Landing/pageBeli');
        }
    }
}
