@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    @if(Session::has('message'))
    <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok"></span><em>{{ Session::get('message') }}</em>
    </div>
    @endif

    <h1>
        Sellers
        <a class="btn btn-small btn-info" href="{{ URL::to('sellers/create') }}">Create a Seller</a>
    </h1>
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($sellers as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->first_name }}</td>
                <td>{{ $value->last_name }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    {{ Form::open(array('url' => 'sellers/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('sellers/' . $value->id) }}">View</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('sellers/' . $value->id . '/edit') }}">Edit</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection