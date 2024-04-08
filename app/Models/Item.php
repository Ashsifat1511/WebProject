<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $primaryKey = 'itemID';
    protected $fillable = [
        'itemID',
        'itemName',
        'stock',
        'rentalOrSale',
        'salePrice',
        'rentRate',
        'photo',
        'ItemType_itemTypeId',
    ];
}
