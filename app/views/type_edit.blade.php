@extends('_master')

@section('title')
	Edit Type
@stop


@section('content')
<div class="tx-h">Update: {{ $type->description }}<br /><img class='imaget' src='/{{ $type->icon_url }}'></div>



	<div class="inbox">
    <div class="forma">
    <table class="table-form">
    {{ Form::model($type, ['method' => 'put', 'action' => ['TypeController@update', $type->id]]) }}
    <!-- Parámetros y variables para obtener los datos del tipo de tarea y la función para editar -->
		<tr>
		  <td colspan="2">
          <div>
          <b>Created:</b> {{ $type->created_at }}<br />
          <b>Last Updated:</b> {{ $type->updated_at }}	
          </div>
          </td>
		</tr>
		<tr>
			<td class="col1">{{ Form::label('description', 'Type Des') }}	<!-- Campo de la descripción con el valor actual-->
			<td class="col2">{{ Form::text('description') }}
		</tr>
        
        <tr>
			<td class="col1">{{ Form::label('icon_url', 'Type Icon') }}		<!-- Campo de url del icono o imagen con la ruta actual -->
			<td class="col2">{{ Form::text('icon_url') }}
		</tr>
		<tr><td colspan="2"><br /><br /><div align="center">{{ HTML::decode(Form::button('<i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Update', array('type' => 'submit','class' => 'login'))) }}</div></td></tr>
	{{ Form::close() }}    
    
    </table>
    </div>
	</div>

@stop