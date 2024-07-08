<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getStatement($fromDate, $toDate)
    {
        return "statement from ".$fromDate." to ".$toDate;
    }

    public function depositAmount()
    {
        return "deposit page";
    }

    public function withdrawAmount()
    {
        return "withdraw page";
    }

    public function updateAccount()
    {
        return "account update page";
    }

    public function closeAccount()
    {
        return "account closure page";
    }

    public function checkBalance()
    {
        return "balance check";
    }


}
