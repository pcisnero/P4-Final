@extends('_master')

@section('title')
	Welcome to Task Manager
@stop

@section('head')

@stop

@section('content')

		@if(Auth::check())			<!-- Si el usuario está logueado da un texto de bienvenida -->
			Welcome to taskManager
		@endif						<!-- Se cierra el if. Si no está logueado no muestra nada-->

@stop

   