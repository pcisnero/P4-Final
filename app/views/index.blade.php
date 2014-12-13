@extends('_master')

@section('title')
	Task Manager
@stop

@section('head')

@stop

@section('content')

		@if(Auth::check())			
			Welcome to taskManager
            
        @else
        
            <div id="container">
                
                    <div id="tx1">
                    Access your account<br><br>
                    <a href='/login' class="btn-login">Log in</a>
                    </div>
                        <div id="tx2">
                        Do not have an account?<br><br>
                        <a href='/signup' class="btn-login">Sign up</a>
                        </div>
               <br><br><br>
            
		@endif						

@stop