<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function register()
    {
        return view('pages.register');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function verifyRegistration(Request $request)
    {
        return "Verifying registration";
    }

    public function validateLogin(Request $request)
    {
        return "Validating login";
    }
}
