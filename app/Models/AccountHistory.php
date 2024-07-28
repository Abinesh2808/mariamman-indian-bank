<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class AccountHistory extends Model
{
    use HasFactory;

    protected $table = 'account_history';
    protected $fillable = ['customer_id','account_number','description','name','transaction_type','debit','credit','status','utr_number'];


    public static function getCustomerId($accountNumber)
    {
        $customerId = Customer::where('account_number',$accountNumber)->first();
        
        return $customerId ? $customerId->customer_id : null;
    }

    public static function getAvailableBalance($accountNumber)
    {   
        $customerId = self::getCustomerId($accountNumber);
        if($customerId){
            $availableBalance = AccountHistory::where('id', $customerId)
                                                ->orderBy('transaction_date', 'desc')
                                                ->first();
            return $availableBalance->balance;
        } else {
            return null;
        }

    }

    public static function getStatement($accountNumber, $fromDate = null, $toDate = null)
    {
        $customerId = self::getCustomerId($accountNumber);

        if ($customerId){
            if (!is_null($fromDate) && !is_null($toDate)) {
                $statement = AccountHistory::where('customer_id', $customerId)
                                     ->whereDate('transaction_date', '>=', $fromDate)
                                     ->whereDate('transaction_date', '<=', $toDate);
                return $statement->get();
            } elseif (!is_null($fromDate)) {
                $statement = AccountHistory::where('customer_id', $customerId)
                                     ->whereDate('transaction_date', '>=', $fromDate);
                return $statement->get();
            } elseif (!is_null($toDate)) {
                $statement = AccountHistory::where('customer_id', $customerId)
                                     ->whereDate('transaction_date', '<=', $toDate);
                return $statement->get();
            } else {
                $statement = AccountHistory::where('customer_id', $customerId);
                return $statement->get();
            }
        } else {
            return null;
        }
    }

    public static function getStatementonPage($accountNumber, $fromDate = null, $toDate = null)
    {
        $customerId = self::getCustomerId($accountNumber);

        if ($customerId){
            if (!is_null($fromDate) && !is_null($toDate)) {
                $statement = AccountHistory::where('customer_id', $customerId)
                                     ->whereDate('transaction_date', '>=', $fromDate)
                                     ->whereDate('transaction_date', '<=', $toDate);
                return $statement->paginate(5);
            } elseif (!is_null($fromDate)) {
                $statement = AccountHistory::where('customer_id', $customerId)
                                     ->whereDate('transaction_date', '>=', $fromDate);
                return $statement->paginate(5);
            } elseif (!is_null($toDate)) {
                $statement = AccountHistory::where('customer_id', $customerId)
                                     ->whereDate('transaction_date', '<=', $toDate);
                return $statement->paginate(5);
            } else {
                $statement = AccountHistory::where('customer_id', $customerId);
                return $statement->paginate(5);
            }
        } else {
            return null;
        }
    }


}   
