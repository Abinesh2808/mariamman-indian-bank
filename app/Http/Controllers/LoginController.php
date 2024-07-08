<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function register()
    {
        return "register Page";
    }

    public function login()
    {
        return "login page";
    }

    public function verifyRegistration()
    {
        return "Verifying registration";
    }

    public function validateLogin()
    {
        return "validating registration";
    }
}
