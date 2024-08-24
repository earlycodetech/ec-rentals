<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    public function  homepage()
    {

        // $cars = Car::latest()->first();
        // $cars = Car::latest()->get();
        $cars = Car::latest()->paginate(6);
        return view('welcome', compact('cars'));
    }


    public function contact()
    {
        return view('contact');
    }

    public function send_message(Request $request)
    {
        $data =  $request->validate([
            'name' => "required|string",
            'email' => "required|string|email",
            'message' => "required|string"
        ]);

        Mail::to('admin@ec-rentals.com')->send(new ContactMail($data));
        Alert::success('Message Sent', "Your message has been sent");
        return back();
    }
}
