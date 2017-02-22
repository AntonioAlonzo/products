@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
	<h1>Edit {{ $seller->first_name }}</h1>

	{{ Form::model($seller, array('route' => array('sellers.update', $seller->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('first_name', 'First name') }}
		{{ Form::text('first_name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('last_name', 'Last name') }}
		{{ Form::text('last_name', null, array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('address', 'Address') }}
		{{ Form::text('address', $seller->address->address, array('class' => 'form-control')) }}
	</div>
	
	<div class="row">
		<div class="form-group col-md-3">
			{{ Form::label('city', 'City') }}
			{{ Form::text('city', $seller->address->address, array('class' => 'form-control')) }}
		</div>

		<div class="form-group col-md-3">
			{{ Form::label('state', 'State') }}
			{{ Form::text('state', $seller->address->address, array('class' => 'form-control')) }}
		</div>

		<div class="form-group col-md-3">
			{{ Form::label('country', 'Country') }}
			{{ Form::text('country', $seller->address->address, array('class' => 'form-control')) }}
		</div>

		<div class="form-group col-md-3">
			{{ Form::label('postal_code', 'Zip Code') }}
			{{ Form::text('postal_code', $seller->address->address, array('class' => 'form-control')) }}
		</div>
	</div>

	{{ Form::submit('Create the Seller', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
</div>
@endsection