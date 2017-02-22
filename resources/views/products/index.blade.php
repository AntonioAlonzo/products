@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    @if(Session::has('message'))
    <div class="alert alert-success">
    <span class="glyphicon glyphicon-ok"></span><em>{{ Session::get('message') }}</em>
    </div>
    @endif

    <h1>
        Products
        <a class="btn btn-small btn-info" href="{{ URL::to('products/create') }}">Create a Product</a>
    </h1>
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td class="col-md-1">ID</td>
                <td class="col-md-1">Name</td>
                <td class="col-md-1">Price</td>
                <td class="col-md-4">Description</td>
                <td class="col-md-1">Seller</td>
                <td class="col-md-1">Labels</td>
                <td class="col-md-3">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->description }}</td>
                <td></td>
                <td>
                    @foreach($value->labels as $label)
                        <span class="label label-default">{{ $label->name }}</span>
                    @endforeach
                </td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    {{ Form::open(array('url' => 'products/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('products/' . $value->id) }}">View</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('products/' . $value->id . '/edit') }}">Edit</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection