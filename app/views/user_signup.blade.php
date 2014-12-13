@extends('_master')

@section('title')
	Log in
@stop

@section('content')

    
    @foreach($errors->all() as $message)
        <div class="ui-state-error ui-corner-all" style="padding: 10px; margin:0 auto; width:320px; margin-top:5px;">
		<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong>{{ $message }}
		</div>
        
    @endforeach
    
    
<div id="index">
	Register your details
    {{ Form::open(array('url' => '/signup')) }}
    
        {{ Form::label('email') }}
        {{ Form::text('email') }}
    
        {{ Form::label('password') }}
        {{ Form::password('password') }}
        <small>Min 6 characters</small><br />
    
        {{ Form::submit('Submit', array('class' => 'login')) }}
    
    {{ Form::close() }}

</div>

@stop