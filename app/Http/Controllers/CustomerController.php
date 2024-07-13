<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function forgotAccountNumber()
    {
        return view('pages.whoami');
    }

    public function forgotPassword()
    {
        return view('pages.findme');
    }
}
