@extends('_master')


@section('title')
	View Type
@stop


@section('content')

	<h2>Type: {{ $type->description }}</h2>			<!-- Nombre del tipo de tarea-->

	<div>
	Created: {{ $type->created_at }}				<!-- Un campo creado con timestamp en tablas-> Creado(fecha y hora)-->
	</div>

	<div>
	Last Updated: {{ $type->updated_at }}			<!-- Campo creado con timestamp en tablas-> Actualizado(fecha y hora)-->
	</div>

	{{---- Edit ----}}
	<a href='/type/{{ $type->id }}/edit'>Edit</a>	<!-- Enlace para modificar los valores del tipo de tarea -->

	{{---- Delete -----}}							<!-- Enlace para eliminar el tipo de tarea -->
	{{ Form::open(['method' => 'DELETE', 'action' => ['TypeController@destroy', $type->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop