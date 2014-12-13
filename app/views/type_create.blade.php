@extends('_master')

@section('title')
	Create a new Type
@stop


@section('content')
	
	<div class="tx-h">Create a Type</div>
    
	<div class="inbox">
    <div class="forma">
	
    <table class="table-form">
    {{ Form::open(array('action' => 'TypeController@store')) }}  <!-- Llama a la función que agrega tipos en controllers/TypeController
    															 llamada 'store' -->

		<tr>
			<td class="col1">{{ Form::label('description','Type Description') }}</td>	<!-- Campo para descripción -->
			<td class="col2">{{ Form::text('description') }}</td>
		</tr>
        
       <tr>
			<td class="col1">{{ Form::label('icon_url','Type Icon') }}</td>		
			<td class="col2">{{ Form::text('icon_url') }}<br /><small>Default directory: images/name_icon.ext</small></td>
		</tr>

		<tr>
		<td colspan="2"><br /><br /><div align="center">{{ HTML::decode(Form::button('<i class="fa fa-plus-circle fa-lg"></i>&nbsp;&nbsp;Add Type', array('type' => 'submit','class' => 'login'))) }}</div></td>
        </tr>

	{{ Form::close() }}
    
    </table>
	</div></div>
@stop