<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $primaryKey = 'rentalID';

    protected $fillable = [
        'rentalDate',
        'returnDate',
        'paid',
        'amountDue',
        'User_username',
        'Item_itemID',
        'Customers_customerID',
    ];

    // Define the relationship with the User model (Many-to-One)
    public function user()
    {
        return $this->belongsTo(User::class, 'User_username', 'username');
    }

    // Define the relationship with the Item model (Many-to-One)
    public function item()
    {
        return $this->belongsTo(Item::class, 'Item_itemID', 'itemID');
    }

    // Define the relationship with the Customer model (Many-to-One)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customers_customerID', 'id');
    }
}
