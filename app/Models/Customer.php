<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = ['name', 'father_name', 'mother_name', 'date_of_birth', 'mobile', 'email', 
                            'address','family_income', 'password', 'id_card_type', 'id_card_number', 
                            'account_number', 'customer_id', 'is_Active', 'reason_for_closure'];

    public static function getLatestAccountNumber()
    {
        $latestAccountNumber = Customer::max('account_number');
        return $latestAccountNumber;
    }

    public static function checkCustomerIDPresence($customerID)
    {
        return Customer::where('customer_id', $customerID) -> exists();
    }

    public static function closeAccount($details)
    {   
        $customer = Customer::where('customer_id', $details['customer_id'])
                            ->update(['reason_for_closure' => $details['reason'],
                                    'is_active' => 0]);
        if ($customer) {
            return response()->json(['message' => 'Account closed successfully.']);
        } else {
            return response()->json(['message' => ['Failed to close the account.',$details]]);
        }
    }
}
