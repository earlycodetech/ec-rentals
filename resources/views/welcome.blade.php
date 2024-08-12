@extends('layouts.app')
@section('content')
    <section>
        <div class="hero">
            <h1>Welcome to EC Rentals</h1>
        </div>
    </section>

    <section>
        <div class="container my-5">
            <h2 class="fs-1 fw-semibold"> New Arrivals </h2>
            <hr>
            <div class="row mt-5">
                @for ($i = 0; $i < 9; $i++)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="card border-0 shadow-sm rounded-0 h-100">
                            <img src="{{ asset('car-1.jpg') }}" alt="" class="card-img-top rounded-0">

                            <div class="card-body">
                                <h5 class="card-title fs-2 fw-semibold">
                                    BMW 78390
                                </h5>
                                <p class="font-monospace fs-5">
                                    $40.98
                                </p>

                                <div class="text-end">
                                    <a href="#" class="btn btn-dark rounded-0">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection