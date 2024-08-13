@extends('layouts.app')
@section('content')
    <section class="my-5 container">
        <div class="card mx-auto bg-white" style="max-width: 600px;">
            <div class="card-header bg-white">
                <h5 class="text-center">Add a New Car</h5>
            </div>

            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Model</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Cover</label>
                        <input type="file" class="form-control" required>
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