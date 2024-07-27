<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function register()
    {
        return view('pages.register');
    }

    public function registerCustomer(Request $request)
    {
        try {
            Customer::create([
                'name' => $request->input('fname') . ' ' . $request->input('lname'),
                'father_name' => $request->input('father_name'),
                'mother_name' => $request->input('mother_name'),
                'date_of_birth' => $request->input('date_of_birth'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'id_card_type' => $request->input('id_card_type'),
                'id_card_number' => $request->input('id_no'),
                'family_income' => $request->input('family_income'),
                'password' => Hash::make($request->input('password')),
                'account_number' => BankController::generate_account_number() 
            ]);
            return response()->json(['message' => 'Customer registered successfully']);
        } catch(Exception $e){
            return response()->json([
                'error' => 'Failed to register customer',
                'message' => $e->getMessage()], 500);
        }
        
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
