@extends('_master')

@section('title')
	Create a new Type
@stop


@section('content')

	<h1>Create a Type</h1>

	{{ Form::open(array('action' => 'TypeController@store')) }}  <!-- Llama a la función que agrega tipos en controllers/TypeController
    															 llamada 'store' -->

		<div>
			{{ Form::label('description','Type Description') }}	<!-- Campo para descripción -->
			{{ Form::text('description') }}
		</div>
        
        <div>
			{{ Form::label('icon_url','Type Icon') }}			<!-- Campo para icono o url de la imagen -->
			{{ Form::text('icon_url') }}
		</div>

		<br><br>
		{{ Form::submit('Add Type') }}

	{{ Form::close() }}

@stop

   <img src=' {{ URL::asset('images/cat.jpg') }} ' alt='Company Logo'>