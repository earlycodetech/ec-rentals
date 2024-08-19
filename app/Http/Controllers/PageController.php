<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function  homepage()  {

        // $cars = Car::latest()->first();
        // $cars = Car::latest()->get();
        $cars = Car::latest()->paginate(6);
        return view('welcome', compact('cars'));
    }
}
