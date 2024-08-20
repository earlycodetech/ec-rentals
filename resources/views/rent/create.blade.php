@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card mx-auto " style="max-width: 500px">
                <img src="{{ asset('uploads/' . $car->cover) }}" class="card-img-top object-fit-cover" style="height: 200px;"
                    alt="">
                <div class="card-header bg-transparent">
                    <h5 class="card-title fs-2 fw-semibold">
                        {{ $car->name }}
                    </h5>
                    <p class="font-monospace fs-5">
                        NGN {{ number_format($car->price) }}
                    </p>
                </div>

                <div class="card-body">
                    <form action="{{ route('rent.form.submit', ['id' => $car->id]) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control" required>
                                @error('quantity')
                                    <p class="text-danger small fw-bold">
                                        <i class="fa-solid fa-exclamation-triangle"></i>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Return Date</label>
                                <input type="date" name="return_date" class="form-control" required>
                                @error('return_date')
                                    <p class="text-danger small fw-bold">
                                        <i class="fa-solid fa-exclamation-triangle"></i>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-dark w-100">
                                    Rent Car
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
