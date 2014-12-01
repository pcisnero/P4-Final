@extends('_master')

@section('title')
	Tasks Completed
@stop

@section('content')

	<h1>Tasks Completed</h1>

	@if(sizeof($tasks) == 0)
		No results
	@else

		@foreach($tasks as $task)		
            
            <section class='task'>

				<div class="name-task">{{ $task['name'] }}</div>	<!-- Nombre de la terea -->
                
				<img class='image' src='/{{ $task['priority']->icon_url }}'>  <!-- icono de prioridad -->
                <img class='image' src='/{{ $task['type']->icon_url }}'>	  <!-- icono de tipo de tarea -->
					
                <div>
                    {{---- DELETE -----}}	<!-- Botón de borrar tarea -->
                    {{ Form::open(array('url' => '/task/delete')) }}
                        {{ Form::hidden('id',$task['id']); }}	<!-- hidden para el id de la tarea  -->
                        <button onClick='parentNode.submit();return false;' class="btn-delete">Delete</button>
                    {{ Form::close() }}
                </div>
				
				
					{{ $task['date']}} <br> <!-- Muestra la fecha de la tarea -->
                    
                     
                <span class="completed">Completed</span>	<!-- Al mostrar solo tareas completas muestra la leyenda -->
                    
                    
				          
			</section>     	
            
		@endforeach

	@endif

@stop







