<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CarsController extends Controller
{
    public function create_car()
    {
        return view('cars.create');
    }


    public function store_car(Request $request)
    {
        $data = $request->validate([
            'name' => "required|string|max:100",
            'model' => "required|string|max:15",
            'price' => "required|numeric",
            'quantity' => "required|numeric",
            'image' => "required|image|mimes:png,jpg,jpeg,gif|max:1024"
        ]);


        $file = $data['image'];
        $ext  = $file->extension();
        // $rand_num = rand(10000, 99999);
        $rand_num = mt_rand();
        $timestamp = time();
        $file_name = "upload_{$timestamp}_{$rand_num}." . $ext;
        $file->move('uploads', $file_name);

        Car::create([
            'name' => $data['name'],
            'model' => $data['model'],
            'price' => $data['price'],
            'cover' => $file_name,
            'quantity' => $data['quantity']
        ]);

        Alert::success('Saved', 'Car added successfully');

        return back();
    }

    public function all_cars()  {
        $cars = Car::all();
        return  view('cars.all-cars', compact('cars'));
    }
}
