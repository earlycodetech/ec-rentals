@extends('layouts.app')
@section('content')
    <section class="my-5 container">
        <div class="card mx-auto bg-white" style="max-width: 600px;">
            <div class="card-header bg-white">
                <h5 class="text-center">Add a New Car</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                        @error('name')
                            <p class="text-danger small fw-bold">
                                <i class="fa-solid fa-exclamation-triangle"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Model</label>
                        <input type="text" name="model" class="form-control" required>
                        @error('model')
                            <p class="text-danger small fw-bold">
                                <i class="fa-solid fa-exclamation-triangle"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" required>
                        @error('price')
                            <p class="text-danger small fw-bold">
                                <i class="fa-solid fa-exclamation-triangle"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                        @error('quantity')
                            <p class="text-danger small fw-bold">
                                <i class="fa-solid fa-exclamation-triangle"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Cover</label>
                        <input type="file" name="image" class="form-control" required>
                        @error('image')
                            <p class="text-danger small fw-bold">
                                <i class="fa-solid fa-exclamation-triangle"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary px-5">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
