<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    public function all_cars()
    {
        $cars = Car::all();
        return  view('cars.all-cars', compact('cars'));
    }

    public function  edit_car($id)
    {
        // $car = Car::find($id);
        $car = Car::findOrFail($id);
        return view('cars.edit-car', compact('car'));
    }

    public function  update_car(Request $request, $id)
    {
        $data = $request->validate([
            'name' => "required|string|max:100",
            'model' => "required|string|max:15",
            'price' => "required|numeric",
            'quantity' => "required|numeric",
            'image' => "nullable|image|mimes:png,jpg,jpeg,gif|max:1024"
        ]);

        $car =  Car::findOrFail($id);
        $oldImage  = public_path('uploads/' . $car->cover);

        if ($request->hasFile('image')) {

            $file = $data['image'];
            $ext  = $file->extension();
            // $rand_num = rand(10000, 99999);
            $rand_num = mt_rand();
            $timestamp = time();
            $file_name = "upload_{$timestamp}_{$rand_num}." . $ext;
            $file->move('uploads', $file_name);

            Car::where('id', '=', $car->id)->update([
                'name' => $data['name'],
                'model' => $data['model'],
                'price' => $data['price'],
                'cover' => $file_name,
                'quantity' => $data['quantity']
            ]);

            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
        } else {
            Car::where('id', '=', $car->id)->update([
                'name' => $data['name'],
                'model' => $data['model'],
                'price' => $data['price'],
                'quantity' => $data['quantity']
            ]);
        }

        Alert::success('Updated', 'Car updated successfully');

        return back();
    }

    public function delete_car($id)
    {
        $car =  Car::findOrFail($id);
        $oldImage  = public_path('uploads/' . $car->cover);

        Car::where('id', '=', $id)->delete();

        if (File::exists($oldImage)) {
            File::delete($oldImage);
        }

        Alert::success('Deleted', 'Car deleted successfully');
        return back();
    }
}
