@extends('_master')

@section('title')
	Tasks Completed
@stop

@section('content')

	<div class="tx-h">Tasks Completed</div>

	@if(sizeof($tasks) == 0)
		No results
	@else

		@foreach($tasks as $task)		
            
            <div class="inbox">
            <section class='task'>

				<div class="name-task">{{ $task['name'] }}</div>	<!-- Nombre de la terea -->
                
				<img class='image' src='/{{ $task['priority']->icon_url }}'>  <!-- icono de prioridad -->
                <img class='image' src='/{{ $task['type']->icon_url }}'>	  <!-- icono de tipo de tarea -->
					
                <div>
                    {{---- DELETE -----}}	<!-- Botón de borrar tarea -->
                    {{ Form::open(array('url' => '/task/delete')) }}
                        {{ Form::hidden('id',$task['id']); }}	<!-- hidden para el id de la tarea  -->
                        <button onClick='parentNode.submit();return false;' class="btn-delete"><i class="fa fa-trash fa-lg"></i></button>
                    {{ Form::close() }}
                </div>
				
				
				<div class="date-task"><b>Date: <span style="color:#D85027">{{ $task['date']}}</span> </b></div><br>
                    
                     
                <div class="completed"><i class="fa fa-check fa-lg"></i>Completed</div>	<!-- Al mostrar solo tareas completas muestra la leyenda -->
                    
                    
				          
			</section>  
            </div>   	
            
		@endforeach

	@endif

@stop







