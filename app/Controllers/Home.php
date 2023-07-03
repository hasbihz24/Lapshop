<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {

        return view('Register');
    }

    public function register()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username Harus Diisi',
                    'is_unique[user.username]' => 'Username Sudah Ada'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Harus Diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Telepon Harus Diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/Home/index');
        }

        $this->userModel->save([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'pass' => $this->request->getVar('password'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp')
        ]);

        return redirect()->to('/');
    }

    public function login()
    {
        return view('login');
    }

    public function aksiLogin()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $this->userModel->where([
            'username' => $username,
            'pass' => $password
        ])->first();

        if ($dataUser) {
            session()->set([
                'username' => $username,
                'logged_in' => TRUE
            ]);
            return redirect()->to('/Landing');
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->to('/');
        }
        // else {
        //     session()->setFlashdata('error', 'Username & Password Salah');
        // }
    }
}
