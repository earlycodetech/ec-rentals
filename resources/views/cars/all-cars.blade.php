@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="table-responsive">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">Cover</th>
                            <th scope="col">Car Name</th>
                            <th scope="col">Car Price</th>
                            <th scope="col">Date Added</th>
                            <th scope="col">Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cars as $car)
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/' . $car->cover ) }}" width="50" alt="">
                                </td>
                                <td> {{ $car->name }} </td>
                                <td> {{ number_format($car->price) }} </td>
                                <td> {{ $car->created_at->format('M. jS Y') }} </td>
                                <td> {{ $car->updated_at->diffForHumans() }} </td>
                                <td>
                                    <a href="{{ route('edit.car', ['id' => $car->id]) }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <form action="{{ route('delete.car', ['id' => $car->id]) }}"
                                        class="d-inline-block"
                                        onsubmit="return confirm('Are you sure?')"
                                        method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    No Cars Available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection
