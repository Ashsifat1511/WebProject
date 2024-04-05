<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone',
        'email',
        'photo',
        'gender',
        'member_since',
    ];

    protected $dates = [
        'member_since',
    ];
    protected function casts(): array
    {
        return [
            'member_since' => 'date',
        ];
    }
}
