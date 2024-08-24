@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card">
                <div class="h5 card-header">My Rentals</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Rented By</th>
                                    <th scope="col">Car</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Return Date</th>
                                    <th scope="col">Rental Date</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rentals as $rent)
                                    <tr>
                                        <td>
                                            {{ $rent->user->name }}
                                        </td>
                                        <td>
                                            {{ $rent->car->name . ' '. $rent->car->model }}
                                        </td>
                                        <td>{{ $rent->quantity }}</td>
                                        <td>{{ number_format($rent->price) }}</td>
                                        <td>
                                            @if ($rent->is_returned)
                                               <span class="fa-solid fa-check-circle text-success"></span> 
                                               @else
                                               <span class="fa-solid fa-times-circle text-danger"></span> 
                                            @endif
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::instance($rent->return_date)->format('M. jS Y') }}
                                        </td>
                                        <td>
                                            {{ $rent->created_at->format('M. jS Y') }}
                                        </td>

                                        {{-- Option Column --}}
                                        <td>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Rentals Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="my-">
                        {!! $rentals->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
