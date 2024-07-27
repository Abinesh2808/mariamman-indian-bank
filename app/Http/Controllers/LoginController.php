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
        $customerData = [
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
                'account_number' => BankController::generateAccountNumber(),
                'customer_id' => BankController::generateCustomerId() 
            ];

        try {
            Customer::create($customerData);
            // return response()->json(['message' => 'Customer registered successfully',
            //                         'data' => $customerData]);
            return redirect()->route('register')
                         ->with('success', 'Account created successfully')
                         ->with('account_number', $customerData['account_number'])
                         ->with('customer_id', $customerData['customer_id']);
        } catch(\Exception $e){
            // return response()->json([
            //     'error' => 'Failed to register customer',
            //     'message' => $e->getMessage(),
            //     'data' => $customerData]);
            return redirect()->route('register')
                         ->with('error', 'Failed to register customer. Please try again after sometime !');
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
