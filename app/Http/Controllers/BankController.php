<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
