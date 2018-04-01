@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <span class="pull-right"><a href="/listings/create"
                                                                               class="btn btn-success btn-xs">Add Listing</a></span>
                </div>

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
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($listings as $listing)

                                <tr>
                                    <th scope="row">{{ $listing->id }}</th>
                                    <td>{{ $listing->name }}</td>
                                    <td>{{ $listing->address }}</td>
                                    <td>{{ $listing->website }}</td>

                                    <td><a href="/listings/{{$listing->id}}/edit" class="btn btn-info">Edit</a></td>
                                    <td>

                                        {!!Form::open(['action' => ['ListingsController@destroy', $listing->id],'method' => 'POST', 'class'=>'pull-left', 'onsubmit'=>'return confirm("Are you sure?")' ])!!}

                                        {{Form::hidden('_method', 'DELETE')}}



                                        {{Form::bsSubmit('delete', ['class'=>'btn btn-danger'])}}
                                        {!! Form::close() !!}


                                    </td>


                                </tr>

                            @endforeach

                            </tbody>
                        </table>



                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
