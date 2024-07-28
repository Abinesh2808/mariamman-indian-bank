<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class CustomerController extends Controller
{
    public function forgotPasswordPage()
    {
        return view('pages.findme');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'account_number' => 'required|string|max:255|exists:customers,account_number',
            'mobile' => 'required|string|max:10|exists:customers,mobile',
            'date_of_birth' => 'required|date'
        ]);

        try {
            
            $details = [
                'account_number' => $request->input('account_number'),
                'mobile' => $request->input('mobile'),
                'dob' => $request->input('date_of_birth')
            ];
            
            $verificationResponse = Customer::verifyCustomer($details);
            
            if ($verificationResponse['message'] === 'Customer verified successfully.') {
                return view('pages.resetPassword', [
                    'account_number' => $details['account_number']
                ]);
            } else {
                return response()->json(['message' => 'Customer verification failed.']);
            }

        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid date format.']);
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'account_number' => ['required'],
            'new_password' => ['required', 'min:8'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);

        $customer = Customer::where('account_number', $request->input('account_number'))->first();

        if (!$customer) {
            return response()->json(['message' => 'Customer not found.'], 404);
        }

        $customer->password = Hash::make($request->input('new_password'));
        $customer->save();

        return redirect()->route('login')->with('success', 'Password updated successfully.');
    }

    public static function getEmailId($accountNumber)
    {
        $emailId = Customer::where('account_number', $accountNumber)->first();
        return $emailId->email;
    }
}
