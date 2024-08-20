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
                @forelse ($cars as $car)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="card border-0 shadow-sm rounded-0 h-100">
                            <img src="{{ asset('uploads/' . $car->cover) }}" alt="" class="card-img-top rounded-0">

                            <div class="card-body">
                                <h5 class="card-title fs-2 fw-semibold">
                                    {{ $car->name }}
                                </h5>
                                <p class="font-monospace fs-5">
                                    NGN {{ number_format($car->price) }}
                                </p>

                                <div class="text-end">
                                    <a href="{{ route('rent.form', ['id' => $car->id]) }}" class="btn btn-dark rounded-0">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="h1">
                        Coming Soon...
                    </p>
                @endforelse
            </div>
        </div>
    </section>
@endsection