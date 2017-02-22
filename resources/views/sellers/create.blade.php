@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
	<h1>Create a Seller</h1>

	{{ Form::open(array('url' => 'sellers')) }}

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
		{{ Form::text('address', null, array('class' => 'form-control')) }}
	</div>
	
	<div class="row">
		<div class="form-group col-md-3">
			{{ Form::label('city', 'City') }}
			{{ Form::text('city', null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group col-md-3">
			{{ Form::label('state', 'State') }}
			{{ Form::text('state', null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group col-md-3">
			{{ Form::label('country', 'Country') }}
			{{ Form::text('country', null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group col-md-3">
			{{ Form::label('postal_code', 'Zip Code') }}
			{{ Form::text('postal_code', null, array('class' => 'form-control')) }}
		</div>
	</div>

	{{ Form::submit('Create the Seller', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
</div>
@endsection