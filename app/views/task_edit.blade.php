@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<div class="inbox">
    <div class="tx-h">Edit</div>
	<div class="tx-h2">{{{ $task['name'] }}}</div>					<!-- nombre de la tarea-->

	<div class="forma">
    <table class="table-form">
	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/task/edit')) }}
		{{ Form::hidden('id',$task['id']); }}		<!-- hidden del id de la tarea-->

		<tr>
			<td class="col1">{{ Form::label('name','Name') }}</td>		<!-- input con el nombre de la tarea a modificar-->
			<td class="col2">{{ Form::text('name',$task['name']); }}</td>
		</tr>

		<tr>
			<td class="col1">{{ Form::label('priority_id', 'Priority') }}</td>	<!-- select con el la prioridad de la tarea seleccionado-->
			<td class="col2">{{ Form::select('priority_id', $priorities, $task->priority_id); }} </td>
            <!-- $task->priority_id para seleccionar el id de la prioridad de la tarea a modificar-->
		</tr>
        
        <tr>
			<td class="col1">{{ Form::label('type_id', 'Type') }}</td>	<!-- select con el tipo de la tarea seleccionado-->
			<td class="col2">{{ Form::select('type_id', $types, $task->type_id); }}</td>
            <!-- $task->type_id para seleccionar el id del tipo de la tarea a modificar-->
		</tr>
        
        <tr>   
        <script type="text/javascript">
		$(document).ready(function() {
				$('#datepicker').datepicker({
					dateFormat: "yy-mm-dd",  
					todayBtn: true,			
					autoclose: true			
					}).val();
		} );
		</script>
        <td class="col1">{{ Form::label('date', 'Date') }}</td>
                
        <td class="col2">{{ Form::text('date', $task['date'], array(	
        'type' => 'text', 							
        'class' => 'form-control','id' => 'datepicker'))}}	</td>
		</tr>
		<tr><td colspan="2"><br /><br /><div align="center">{{ HTML::decode(Form::button('<i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Save', array('type' => 'submit','class' => 'login'))) }}</div></td></tr>
        
	{{ Form::close() }}
    </table>
    </div></div>

@stop