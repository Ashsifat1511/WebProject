<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'rentalDate',
        'returnDate',
        'paid',
        'Item_itemID',
        'Customers_customerID',
        'quantity',
        'isReturned',
    ];

    protected $dates = [
        'rentalDate',
        'returnDate',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'Item_itemID', 'itemID');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customers_customerID', 'id');
    }
}
