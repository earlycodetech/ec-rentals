<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RentalController extends Controller
{
    public function rent_form($id) {
        $car = Car::findOrFail($id);    
        return view('rent.create', compact('car'));
    }

    public function submit_rent_form (Request $request, $id) {

        $car = Car::findOrFail($id); 

        $data = $request->validate([
            'quantity' => "required|numeric|min:1",
            'return_date' => "required|date|after_or_equal:today"
        ]);


        if ($car->quantity < $data['quantity']) {
           Alert::error('Insuficient Cars', "We only have {$car->quantity} available!");
           return back();
        }

       /* The line ` = intval(->quantity) - intval(['quantity']);` is calculating
       the new quantity of cars available after a rental transaction. It takes the current quantity
       of the car from the database (`->quantity`), converts it to an integer using `intval()`,
       subtracts the quantity requested in the rental form (`['quantity']`), and assigns the
       result to the variable ``. This calculation helps to update the quantity of
       available cars after a successful rental transaction by reducing the number of cars rented
       from the total quantity available. */
        $newQuantity = intval($car->quantity) - intval($data['quantity']);

        /* The line ` = floatval(->price) * intval(['quantity']);` is calculating the
        total price for the rental transaction. */
        $price = floatval($car->price) * intval($data['quantity']);

        $user = Auth::user();
        Rental::create([
            'user_id' => $user->id,
            'car_id' => $car->id,
            'name' => $user->name,
            'price' => $price,
            'phone' => $user->phone,
            'quantity' => $data['quantity'],
            'return_date' => $data['return_date'],
        ]);

        Car::where('id', $car->id)->update([
            'quantity' => $newQuantity
        ]);

        Alert::success('Rental Successful', "Your Rental Request Has Been Made Successfully");
        return back();
    }


    public function show_user_rentals() {
        return view('rent.user-rentals');
    }


    // ADMIN FUNCTIONS
    public function admin_show_rentals()
    {
        $rentals = Rental::latest()->paginate(10);
        return view('admin.rentals', compact('rentals'));
    }

    public function update_rental($id, $type) {
        $rental = Rental::findOrFail($id);
        Rental::where('id', $id)->update([
             'is_returned' => ($type == 'enable')
        ]);

        Alert::success('Success', "Updated Successfully");
        return back();
    }
}
