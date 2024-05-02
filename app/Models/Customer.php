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
        'username',
        'cid',
        'address',
        'phone',
        'email',
        'photo',
        'password',
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
    //define the relationship with the User model (One-to-Many)

    public function user()
    {
        return $this->belongsTo(User::class, 'cid', 'id');
    }
}
