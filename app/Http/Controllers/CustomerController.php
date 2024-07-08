<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function forgotAccountNumber()
    {
        return "account number recovery page";
    }

    public function forgotPassword()
    {
        return "password recovery page";
    }
}
