@extends('_master')

@section('title')
	Tasks
@stop

@section('content')

	<div class="tx-h">All Tasks</div>

	@if($query)
		<div class="tx-h2">You searched for {{{ $query }}}</div>
	@endif

	@if(sizeof($tasks) == 0)
		No results
	@else

		@foreach($tasks as $task)		
            
            <div class="inbox">
            <section class='task'>

				<div class="name-task">{{ $task['name'] }}</div>
                
				<img class='image' src='{{ $task['priority']->icon_url }}'> <!-- iconos respectivos -->
                <img class='image' src='{{ $task['type']->icon_url }}'>
				<a href='/task/edit/{{$task['id']}}' class="btn-edit"><i class="fa fa-edit fa-lg"></i>&nbsp;&nbsp;Edit</a>
                {{---- DELETE -----}}		<!-- Botón para elimiar la tarea -->
		{{ Form::open(array('url' => '/task/delete')) }}
			{{ Form::hidden('id',$task['id']); }}
			<button onClick='parentNode.submit();return false;' class="btn-delete"><i class="fa fa-trash fa-lg"></i></button>
		{{ Form::close() }}
				
				
					<div class="date-task"><b>Date: <span style="color:#D85027">{{ $task['date']}}</span> </b></div><br>
                    
                    @if($task['complete']==1)     					<!-- si la tarea está completa valor = 1 -->
                        <div class="completed"><i class="fa fa-check fa-lg"></i>Completed</div>
                    @else											<!-- sino -->
                    	
                            <div class="btn-complete">
                            <!-- al ser tareas no completas por default muestra el botón  para cambiar el estado a completa-->
                            {{---- UPDATE COMPLETE -----}}	
                            {{ Form::open(array('url' => '/task/complete')) }}
                            {{ Form::hidden('id',$task['id']); }}
                                <button onClick='parentNode.submit();return false;' class="complete"><i class="fa fa-check-circle-o fa-lg"></i>&nbsp;&nbsp;Complete</button>
                            {{ Form::close() }}
                        </div>
                        
                	@endif		<!-- fin del condicional -->
                    
				         
			</section> 
            </div>    	
            
		@endforeach

	@endif

@stop







