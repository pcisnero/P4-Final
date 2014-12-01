@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $task['name'] }}}</h2>					<!-- nombre de la tarea-->

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/task/edit')) }}
		{{ Form::hidden('id',$task['id']); }}		<!-- hidden del id de la tarea-->

		<div class='form-group'>
			{{ Form::label('name','Name') }}		<!-- input con el nombre de la tarea a modificar-->
			{{ Form::text('name',$task['name']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('priority_id', 'Priority') }}	<!-- select con el la prioridad de la tarea seleccionado-->
			{{ Form::select('priority_id', $priorities, $task->priority_id); }} 
            <!-- $task->priority_id para seleccionar el id de la prioridad de la tarea a modificar-->
		</div>
        
        <div class='form-group'>
			{{ Form::label('type_id', 'Type') }}	<!-- select con el tipo de la tarea seleccionado-->
			{{ Form::select('type_id', $types, $task->type_id); }}
            <!-- $task->type_id para seleccionar el id del tipo de la tarea a modificar-->
		</div>        
        <!-- Aquí los archivos para poder visualizar y que funcione el datepicker-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/datepicker/css/datepicker.css">
		<script type="text/javascript" src="/datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
		$(document).ready(function() {
			    $('#datepicker').datepicker({
					format: "yyyy-mm-dd",
					todayBtn: true,
					autoclose: true
					});
		} );
		</script>
                
        {{ Form::text('date', $task['date'], array(	
        'type' => 'text', 							
        'class' => 'form-control','id' => 'datepicker'))}}	

		{{ Form::submit('Save'); }}<br /><br />      
        
	{{ Form::close() }}
	<div>
		{{---- DELETE -----}}		<!-- Botón para elimiar la tarea -->
		{{ Form::open(array('url' => '/task/delete')) }}
			{{ Form::hidden('id',$task['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
	</div>


@stop
  