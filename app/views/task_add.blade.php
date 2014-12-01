@extends('_master')

@section('title')
	Add a new task
@stop

@section('content')

	<h1>Add a new task</h1>

	{{ Form::open(array('url' => '/task/create')) }}

		{{ Form::label('name','Name') }}	<!-- Campo Name aquí el texto y haciendo referencia al select -->
		{{ Form::text('name'); }}			<!-- Campo 'name' haciendo sin valor asignado(el valor lo escribimos)-->

		{{ Form::label('priority_id', 'Priority') }}		<!-- Campo Priority aquí el texto y haciendo referencia al select -->
		{{ Form::select('priority_id', $priorities); }}		<!-- Campo 'priority_id' haciendo referencia a la tabla 'priorities'-->
        
        {{ Form::label('type_id', 'Type') }}		<!-- Campo Type aquí el texto y haciendo referencia al select -->
		{{ Form::select('type_id', $types); }}		<!-- Campo 'type_id' haciendo referencia a la tabla 'types'-->
        
        <!-- Aquí los archivos para poder visualizar y que funcione el datepicker-->
        <!-- Se encuentra en la carpeta app/public/datepicker -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/datepicker/css/datepicker.css">
		<script type="text/javascript" src="/datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
		$(document).ready(function() {
			    $('#datepicker').datepicker({
					format: "yyyy-mm-dd",   <!-- Formato del datepicker año-mes-dia (default en mysql) -->
					todayBtn: true,			<!-- ésta opción permite remarcar el dia de hoy en el calendario-->
					autoclose: true			<!-- ésta opción desaparece el calendario una vez que se eligió fecha-->
					});
		} );
		</script>
        <!-- Aquí el input para la fecha, en los valores se llama 'date' y null pertenece al valor del input, 
        en éste caso nulo, pues aquí va la fecha -->
        {{ Form::text('date', null, array(		
        
        'type' => 'text', 			
        'class' => 'form-control',	
        'placeholder' => 'Pick the date this task should be completed',	
        'id' => 'datepicker'))}}			
        
		{{ Form::hidden('user_id',  Auth::user()->id); }}	

		{{ Form::submit('Add'); }}

	{{ Form::close() }}
    
@stop
