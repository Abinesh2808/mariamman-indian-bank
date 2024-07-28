<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class BankController extends Controller
{
    public function aboutUs()
    {
        return view('pages.aboutus');
    }

    public function contactUs()
    {
        return view('pages.contactus');
    }

    public static function generateAccountNumber()
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

    public static function generateCustomerId()
    {
        $ifscPrefix = env("IFSC_PREFIX", "");

        do {
            $customerNumber = rand(100102, 990945);
            $customerID = $ifscPrefix.(String)$customerNumber;

        } while(Customer::checkCustomerIDPresence($customerID));
        
        return $customerID;
    }

    public static function generateUtrNumber()
    {
        $utrNumber = substr(uniqid(mt_rand(), true), 0, 12);
        return $utrNumber;
    }
}
