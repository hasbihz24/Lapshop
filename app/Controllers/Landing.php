<?php

namespace App\Controllers;

use App\Models\UserModel;

class Landing extends BaseController
{
    public function index()
    {
        return view('LandingView');
    }
}
