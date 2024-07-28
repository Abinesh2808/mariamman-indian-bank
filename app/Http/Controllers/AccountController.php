<?php

namespace App\Http\Controllers;
use App\Models\AccountHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CustomerController;
use PDF;
use Mail;

class AccountController extends Controller
{
    public function getStatementPage()
    {
        return view('pages.statement');
    }

    public function getStatement(Request $request)
    {
        $details = [
            'account_number' => $request->input('account_number'),
            'customer_id' => AccountHistory::getCustomerId($request->input('account_number')),
            'mobile_number' => $request->input('mobile'),
            'utr_number' => BankController::generateUtrNumber(),
            'transaction_type' => 'statement',
            'statement_from' => $request->input('fromDate'),
            'statement_to' => $request->input('toDate')
        ];

        $account_statement = AccountHistory::getStatementonPage($details['account_number'], $details['statement_from'], $details['statement_to']);
                return view('pages.statement', ['account_statement' => $account_statement])->with($request->input());
    }

    public function exportStatementPDF(Request $request)
    {   
        $details = [
            'accountNumber' =>$request->input('account_number'),
            'fromDate' => $request->input('fromDate'),
            'toDate' => $request->input('toDate')
        ];
        

        $statements = AccountHistory::getStatement($details['accountNumber'], $details['fromDate'], $details['toDate']);

        $pdf = PDF::loadView('pages.statement_pdf', ['details' => $details, 'statements' => $statements]);

        return $pdf->download('account_statement_'.$details['fromDate'].'_'.$details['toDate'].'.pdf');
    }

    public function sendStatementEmail(Request $request)
    {   
        $details = [
            'accountNumber' =>$request->input('account_number'),
            'fromDate' => $request->input('fromDate'),
            'toDate' => $request->input('toDate')
        ];

        $statements = AccountHistory::getStatement($details['accountNumber'], $details['fromDate'], $details['toDate']);

        $pdf = PDF::loadView('pages.statement_pdf', ['details' => $details, 'statements' => $statements]);

        $emailID = CustomerController::getEmailId($details['accountNumber']);
        $ccEmail = env("MAIL_CC", "");

        Mail::send('pages.statement_email', ['statements' => $statements, 'details' => $details], function($message) use ($emailID, $pdf, $ccEmail, $details) {
            $message->to($emailID)
                    ->cc($ccEmail)
                    ->subject('Account Statement from '.$details['fromDate'].' to '.$details['toDate'])
                    ->attachData($pdf->output(), 'account_statement_'.$details['fromDate'].'_'.$details['toDate'].'.pdf');
        });

        return redirect()->route('statement')->with('success', 'Account statement sent to your email.');
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

        } catch(\Exception $e){
            // 'status' => '',
            return redirect()->route('withdraw')
                         ->with('error', 'Failed to withdraw amount. Please verify account details and try again after sometime !');
        }
    }

    public function updateAccount()
    {
        return view('pages.update_account');
    }

    public function closeAccountPage()
    {
        return view('pages.close_account');
    }

    public function closeAccount()
    {
        return view('pages.close_account');
    }

    public function checkBalancePage()
    {
        return view('pages.check_balance');
    }

    public function checkBalance(Request $request)
    {
        $details = [
            'account_number' => $request->input('account_number'),
            'customer_id' => AccountHistory::getCustomerId($request->input('account_number')),
            'mobile_number' => $request->input('mobile'),
            'utr_number' => BankController::generateUtrNumber(),
            'transaction_type' => 'balance_check'
        ];

        try {
            $availableBalance = AccountHistory::getAvailableBalance($details['account_number']);
            
            if($availableBalance){
                return redirect()->route('check_balance')
                    ->with('balance', $availableBalance);
            } else {
                return redirect()->route('check_balance')
                         ->with('error', 'Failed to fetch available balance. Please verify account details and try again after sometime !');
            }

        } catch (\Exception $e){
            // 'status' => '',
            return redirect()->route('check_balance')
                         ->with('error', 'Failed to fetch available balance. Please verify account details and try again after sometime !');
        }
    }
}
