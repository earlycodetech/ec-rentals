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
        'price',
        'phone',
        'quantity',
        'return_date',
        'is_returned'
    ];

    protected $casts = [
        'price' => "decimal:2",
        'return_date' => 'date',
        'is_returned' => "boolean"
    ];


    public function car()  {
        return $this->belongsTo(Car::class, 'car_id');
    }


    public function user()  {
        return $this->belongsTo(User::class, 'user_id');
    }
}
