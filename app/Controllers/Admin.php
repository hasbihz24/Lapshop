<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\LaptopModel;
use App\Models\UserModel;
use App\Models\PesanModel;

class Admin extends BaseController
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
        $data = [
            'laptop' => $this->laptopModel->getLaptop()
        ];

        return view('dashboard', $data);
    }
    public function transaksi()
    {
        
        $data = [
            'pesan' => $this->pesanModel->getPesan()
        ];
        return view('transaksiView', $data);
    }
    public function tambah()
    {
        return view('form_tambah');
    }
    public function edit($slug)
    {
        session()->set([
            'slug' => $slug
        ]);
        $laptopDetail = $this->laptopModel->getLaptop($slug);
        $data = [
            'laptop' => $laptopDetail
        ];
        return view('form_edit', $data);
    }
    public function aksiTambah()
    {
        $nama = $this->request->getVar('nama');
        $merek = $this->request->getVar('merek');
        $jenis = $this->request->getVar('jenis');
        $jumlah = $this->request->getVar('jumlah');
        $harga = $this->request->getVar('harga');
        $deskripsi = $this->request->getVar('deskripsi');
        $id_laptop = rand(1000, 9999);
        $slug = url_title($nama, '-', true);
        $namaGambar = $slug . '.jpg';
        $gambar = $this->request->getFile('sampul');
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambar->move(ROOTPATH . 'public/img', $namaGambar);
            $this->laptopModel->insert([
                'id_laptop' => $id_laptop,
                'nama' => $nama,
                'merek' => $merek,
                'jenis' => $jenis,
                'jumlah' => $jumlah,
                'harga' => $harga,
                'gambar' => $namaGambar,
                'slug' => $slug,
                'deskripsi' => $deskripsi,
            ]);
        } else {
            echo 'Gagal mengunggah gambar.';
        }
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/Admin/index');
    }
    public function aksiedit()
    {

        $nama = $this->request->getVar('nama');
        $merek = $this->request->getVar('merek');
        $jenis = $this->request->getVar('jenis');
        $jumlah = $this->request->getVar('jumlah');
        $harga = $this->request->getVar('harga');
        $deskripsi = $this->request->getVar('deskripsi');
        $Slug = session()->get('slug');
        $laptopDetail = $this->laptopModel->getLaptop($Slug);
        $id_laptop = $laptopDetail['id_laptop'];
        $slug = url_title($nama, '-', true);
        $data2 = [
            'nama' => $nama,
            'merek' => $merek,
            'jenis' => $jenis,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'slug' => $slug,
            'deskripsi' => $deskripsi,
        ];
        $this->laptopModel->update(
            $id_laptop,
            $data2
        );

        session()->setFlashdata('pesan', 'Data Berhasil Diedit.');

        return redirect()->to('/Admin/index');
    }
    public function hapus($slug)
    {
        $laptopDetail = $this->laptopModel->getLaptop($slug);
        $id_laptop = $laptopDetail['id_laptop'];
        $this->laptopModel->delete($id_laptop);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');

        return redirect()->to('/Admin/index');
    }

    public function kirim($username){
        $pesanDB = $this->pesanModel->getPesan($username);
        $JsonDecode = json_decode($pesanDB['daftar_laptop'], true);
        foreach($JsonDecode as $data){
            foreach($data as $lap){
                $laptop = $this->laptopModel->getLaptop($lap['slug']);
                $id_laptop = $laptop['id_laptop'];
                $jmlLap = $laptop['jumlah'] - 1;
                $this->laptopModel->update($id_laptop,[
                    'jumlah' => $jmlLap
                ]);
            }
        }
        $id_pesan = $pesanDB['id_pesan'];
        $this->pesanModel->delete($id_pesan);
        session()->setFlashdata('pesan', 'Barang Berhasil Dikirim.');

        return redirect()->to('/Admin/index');
    }
}
