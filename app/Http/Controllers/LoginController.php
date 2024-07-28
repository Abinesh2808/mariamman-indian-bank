<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    public function register()
    {
        return view('pages.register');
    }

    public function registerCustomer(Request $request)
    {   
        Log::info('Register customer request data:', $request->all());
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'mobile' => 'required|string|max:10|unique:customers,mobile',
            'email' => 'required|email|max:255|unique:customers,email',
            'address' => 'required|string|max:1000',
            'id_card_type' => 'required|string',
            'id_no' => 'required|string|max:255',
            'family_income' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
        ]);
        Log::info('Validated data:', $validatedData);
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
        Log::info('Customer data before saving:', $customerData);
        try {
            Customer::create($customerData);
            Log::info('Customer registered successfully:', $customerData);
            // return response()->json(['message' => 'Customer registered successfully',
            //                         'data' => $customerData]);
            return redirect()->route('register')
                         ->with('success', 'Account created successfully')
                         ->with('account_number', $customerData['account_number'])
                         ->with('customer_id', $customerData['customer_id']);
        } catch(\Exception $e){
            Log::error('Customer registration failed', [
                'error' => $e->getMessage(),
                'data' => $customerData
            ]);
            // return response()->json([
            //     'error' => 'Failed to register customer',
            //     'message' => $e->getMessage(),
            //     'data' => $customerData]);
            return redirect()->route('register')
                         ->with('error', 'Failed to register customer. Please try again after sometime !'.$e);
        }
        
    }

    public function loginPage()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $authAttempt = Auth::attempt($credentials);

        $user = Auth::user();
        Auth::login($user);

        if ($user->is_active) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Your account is inactive.',
            ]);
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
