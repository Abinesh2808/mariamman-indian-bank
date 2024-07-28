<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

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

    public static function getEmailId($accountNumber)
    {
        $emailId = Customer::where('account_number',$accountNumber)->first();
        return $emailId->email;
    }

}
