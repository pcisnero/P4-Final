@extends('_master')

@section('title')
	No complete Tasks
@stop

@section('content')

	<h1>No complete task</h1>


	@if(sizeof($tasks) == 0)
		No results
	@else

		@foreach($tasks as $task)		
            
            <section class='task'>

				<div class="name-task">{{ $task['name'] }}</div>
                
				<img class='image' src='/{{ $task['priority']->icon_url }}'>		<!-- iconos respectivos -->
                <img class='image' src='/{{ $task['type']->icon_url }}'>
				<p>
					<a href='/task/edit/{{$task['id']}}' class="btn-edit">Edit</a>	<!-- botón para editar tarea -->
				</p>
				
				
					{{ $task['date']}} <br>					<!-- fecha de la tarea no completa -->
                    
                    
                    		<!-- al ser tareas no completas por default muestra el botón  para cambiar el estado a completa-->
                            {{---- UPDATE COMPLETE -----}}	
                            {{ Form::open(array('url' => '/task/complete')) }}
                                {{ Form::hidden('id',$task['id']); }}
                                <button onClick='parentNode.submit();return false;'>Complete</button>
                            {{ Form::close() }}
                        
                    
				         
			</section>   	  	
            
		@endforeach

	@endif

@stop

   <img src=' {{ URL::asset('images/cat.jpg') }} ' alt='Company Logo'>





