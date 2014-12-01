@extends('_master')

@section('title')
	Tasks
@stop

@section('content')

	<h1>All Tasks</h1>

	@if($query)
		<h2>You searched for {{{ $query }}}</h2>
	@endif

	@if(sizeof($tasks) == 0)
		No results
	@else

		@foreach($tasks as $task)		
            
            <section class='task'>

				<div class="name-task">{{ $task['name'] }}</div>
                
				<img class='image' src='{{ $task['priority']->icon_url }}'> <!-- iconos respectivos -->
                <img class='image' src='{{ $task['type']->icon_url }}'>
				<p>
					<a href='/task/edit/{{$task['id']}}' class="btn-edit">Edit</a>	<!-- botón para editar la tarea -->
				</p>
				
				
					{{ $task['date']}} <br>	<!-- fecha de la tarea -->
                    
                    @if($task['complete']==1)     					<!-- si la tarea está completa valor = 1 -->
                        <span class="completed">Completed</span>	<!-- colocar el texto de 'Completed' -->
                    @else											<!-- sino -->
                    	
                            {{---- UPDATE COMPLETE -----}}			<!-- colocar el botón para cambiar de estado a completa -->
                            {{ Form::open(array('url' => '/task/complete')) }}	<!-- ruta del archivo -->
                                {{ Form::hidden('id',$task['id']); }}			<!-- hidden del id de la tarea -->
                                <button onClick='parentNode.submit();return false;'>Complete</button>
                            {{ Form::close() }}
                        
                	@endif		<!-- fin del condicional -->
                    
				         
			</section>     	
            
		@endforeach

	@endif

@stop







