<?php

namespace App\Http\Controllers;
use App\Models\AccountHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\BankController;

class AccountController extends Controller
{
    public function getStatement()
    {
        return view('pages.statement');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function depositAmountPage()
    {
        return view('pages.deposit');
    }

    public function depositAmount(Request $request)
    {
        $creditDetails = [
            'account_number' => $request->input('account_number'),
            'customer_id' => AccountHistory::getCustomerId($request->input('account_number')),
            'credit' => $request->input('amount'),
            'description' => $request->input('description'),
            'name' => $request->input('payer'),
            'utr_number' => BankController::generateUtrNumber(),
            'transaction_type' => 'credit'
        ];

        try {
            AccountHistory::create($creditDetails);
            return redirect()->route('deposit')
                         ->with('success', 'Amount deposited successfully !');

        } catch (\Exception $e){
            // 'status' => '',
            return redirect()->route('deposit')
                         ->with('error', 'Failed to deposit amount. Please verify account details and try again after sometime !');
        }
    }

    public function withdrawAmountPage()
    {
        return view('pages.withdraw');
    }

    public function withdrawAmount(Request $request)
    {
        $debitDetails = [
            'account_number' => $request->input('account_number'),
            'customer_id' => AccountHistory::getCustomerId($request->input('account_number')),
            'debit' => $request->input('amount'),
            'description' => 'Cash withdraw by '.$request->input('payee'),
            'name' => $request->input('payee'),
            'utr_number' => BankController::generateUtrNumber(),
            'transaction_type' => 'debit'
        ];

        try {
            AccountHistory::create($debitDetails);
            return redirect()->route('withdraw')
                         ->with('success', 'Amount withdrawn successfully !');

        } catch (\Exception $e){
            // 'status' => '',
            return response()->json([
                'error' => 'Failed to withdraw amount. Please verify account details and try again after sometime !',
                'message' => $e->getMessage(),
                'data' => $debitDetails]);
        }
    }

    public function updateAccount()
    {
        return view('pages.update_account');
    }

    public function closeAccount()
    {
        return view('pages.close_account');
    }

    public function checkBalance()
    {
        return view('pages.check_balance');
    }
}
