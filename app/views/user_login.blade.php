@extends('_master')

@section('title')
	Log in
@stop

@section('content')

<div id="index">
	Login with your registered details
		 {{ Form::open(array('url' => '/login')) }}

                {{ Form::label('email') }}
                {{ Form::text('email') }}
                {{ Form::label('password') }} 
                {{ Form::password('password') }}
            	<br />
                {{ Form::submit('Submit', array('class' => 'login')) }}
            
          {{ Form::close() }}
</div>
@stop