<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\customer;

class BankController extends Controller
{
    public function aboutUs()
    {
        // Return the view for the "About Us" page
        return view('pages.aboutus');
    }

    public function contactUs()
    {
        // Return the view for the "Contact Us" page
        return view('pages.contactus');
    }

    public function generate_account_number()
    {
        $accountNumberPrefix = env('ACCOUNT_NUMBER_PREFIX');
        $latestAccountNumber = customer::getLatestAccountNumber();

        $newAccountnumber = (int)$latestAccountNumber + 1;

        return $newAccountnumber;
    }
}
