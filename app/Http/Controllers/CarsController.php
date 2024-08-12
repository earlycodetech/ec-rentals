<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CarsController extends Controller
{
    public function create_car()
    {
        Alert::success("Car Added","Your car was added successfully");
        return view('cars.create');
    }
}
