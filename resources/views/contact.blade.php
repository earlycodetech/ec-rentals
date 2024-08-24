@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card mx-auto" style="max-width: 500px;">
                <div class="card-header">
                    <h5>Contact Us</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('contact.send') }}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                            <input type="text" placeholder="Full Name" name="name" class="form-control bg-white">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="email" placeholder="Email" name="email" class="form-control bg-white">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="message" placeholder="Message" class="form-control bg-white" rows="10"></textarea>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
