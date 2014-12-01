@extends('_master')

@section('title')
	Edit Type
@stop


@section('content')

	{{ Form::model($type, ['method' => 'put', 'action' => ['TypeController@update', $type->id]]) }}
    <!-- Parámetros y variables para obtener los datos del tipo de tarea y la función para editar -->

		<h2>Update: {{ $type->description }}</h2>

		<div class='form-group'>
			{{ Form::label('description', 'Type Des') }}	<!-- Campo de la descripción con el valor actual-->
			{{ Form::text('description') }}
		</div>
        
        <div class='form-group'>
			{{ Form::label('icon_url', 'Type Icon') }}		<!-- Campo de url del icono o imagen con la ruta actual -->
			{{ Form::text('icon_url') }}
		</div>

		{{ Form::submit('Update') }}

	{{ Form::close() }}


	{{---- DELETE -----}}	<!-- Botón para eliminar el tipo de tarea que se está editando -->
	{{ Form::open(['method' => 'DELETE', 'action' => ['TypeController@destroy', $type->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop