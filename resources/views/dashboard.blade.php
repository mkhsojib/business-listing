@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>Your Listings</h3>

                        @if(count($listings))

                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Web</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($listings as $listing)

                                    <tr>
                                        <th scope="row">{{ $listing->id }}</th>
                                        <td>{{ $listing->name }}</td>
                                        <td>{{ $listing->address }}</td>
                                        <td>{{ $listing->website }}</td>


                                    </tr>

                                @endforeach

                                </tbody>
                            </table>



                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
