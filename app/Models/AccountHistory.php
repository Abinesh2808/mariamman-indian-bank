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
        
        return $customerId ? $customerId->id : null;
    }

    public static function getAvailableBalance($accountNumber)
    {   
        $customerId = self::getCustomerId($accountNumber);
        if($customerId){
            $availableBalance = AccountHistory::where('customer_id', $customerId)
                                                ->orderBy('transaction_date', 'desc')
                                                ->first();
            return $availableBalance->balance;
        } else {
            return null;
        }

    }
}   
