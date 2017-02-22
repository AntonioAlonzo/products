@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    <h1>Showing {{ $seller->id }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $seller->first_name }}</h2>
        <p>
            <strong>First name:</strong> {{ $seller->first_name }}<br>
            <strong>Last name:</strong> {{ $seller->last_name }}
        </p>
    </div>
</div>
@endsection