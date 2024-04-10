<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $primaryKey = 'accountID';

    protected $fillable = [
        'accountName',
        'accountDetails',
        'Customers_customerID',
        'User_username',
        'payMethod',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customers_customerID', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'User_username', 'username');
    }
}
