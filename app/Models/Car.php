<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = "cars";

    protected $fillable = [
        'name',
        'model',
        'price',
        'cover',
        'quantity'
    ];


    // protected $hidden = [
    //     'id'
    // ];

    protected $casts = [
        'price' => "decimal:2",
        'quantity' => "integer"
    ];
}
