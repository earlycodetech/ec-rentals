<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'name',
        'phone',
        'quantity',
        'return_date',
        'is_returned'
    ];

    protected $casts = [
        'price' => "decimal:2",
        'return_date' => 'date',
        'is_returned' => "boolean"
    ]
}
