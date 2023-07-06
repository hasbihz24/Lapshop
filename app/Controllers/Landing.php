<?php

namespace App\Controllers;

use App\Models\UserModel;

class Landing extends BaseController
{
    public function index()
    {
        echo view('navbar');
        echo view('LandingView');
    }

    public function pageBeli()
    {
        echo view('navbar');
        echo view('beliView');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
