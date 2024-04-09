<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $primaryKey = 'purchaseID';

    protected $fillable = [
        'purchaseDate', 'purchaseQuantity', 'amountDue', 'User_username', 'Item_itemID', 'Customers_customerID', 'payAmount'
    ];

    // Define the relationship with User model (Many-to-One)
    public function user()
    {
        return $this->belongsTo(User::class, 'User_username', 'username');
    }

    // Define the relationship with Item model (Many-to-One)
    public function item()
    {
        return $this->belongsTo(Item::class, 'Item_itemID', 'itemID');
    }

    // Define the relationship with Customer model (Many-to-One)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
