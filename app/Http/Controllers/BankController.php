<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

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

    public static function generate_account_number()
    {
        $accountNumberPrefix = env("ACCOUNT_NUMBER_PREFIX", "");
        $latestAccountNumber = Customer::getLatestAccountNumber();

        if($latestAccountNumber){
            $newAccountnumber = (int)$latestAccountNumber + 1;
            return $newAccountnumber;
        } else {
            $newAccountnumber = (String)$accountNumberPrefix."00001";
            return (int)$newAccountnumber;
        }
    }
}
