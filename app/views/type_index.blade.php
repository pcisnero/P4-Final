@extends('_master')


@section('title')
	All the types
@stop


@section('content')

	<h2>Types</h2>


	<a href='/type/create'>+ Add a new type</a>		<!-- Enlace para agregar un nuevo tipo de tarea-->

	<br><br>

	@foreach($types as $type)

		<div>
			<img class='image' src='{{ $type->icon_url }}'>		<!-- Icono del tipo de tarea-->
            <a href='/type/{{ $type->id }}'>{{ $type->description }}</a><br /><br /><br /><br /> <!-- descripción del tipo de tarea-->
		</div>

	@endforeach

@stop

