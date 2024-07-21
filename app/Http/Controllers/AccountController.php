<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getStatement()
    {
        return view('pages.statement');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function depositAmount()
    {
        return view('pages.deposit');
    }

    public function withdrawAmount()
    {
        return view('pages.withdraw');
    }

    public function updateAccount()
    {
        return view('pages.update_account');
    }

    public function closeAccount()
    {
        return view('pages.close_account');
    }

    public function checkBalance()
    {
        return view('pages.check_balance');
    }
}
