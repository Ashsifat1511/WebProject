<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $primaryKey = 'purchaseID';

    protected $fillable = [
        'purchaseDate', 'purchaseQuantity',  'Item_itemID', 'Customers_customerID', 'payAmount'
    ];

    protected $dates = [
        'purchaseDate',
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
