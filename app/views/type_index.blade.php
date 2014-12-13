@extends('_master')


@section('title')
	All the types
@stop


@section('content')
<div class="tx-h">Types</div>

	<div class="inbox">
    <div class="forma">
        
    <div align="right"><a href='/type/create' class="login"><i class="fa fa-plus fa-lg"></i>&nbsp;&nbsp; Add a new type</a></div>   
			<!-- Enlace para agregar un nuevo tipo de tarea-->

	<br><br>

	@foreach($types as $type)

		<div class='types'>
			<img class='imaget' src='{{ $type->icon_url }}'>		
            <br />{{ $type->description }}
            <br /><br />
            {{---- Edit ----}}
            <a href='/type/{{ $type->id }}/edit'  class="btn-edit2" style="color:#333"><i class="fa fa-edit fa-lg"></i></a>	<!-- Enlace para modificar los valores del tipo de tarea -->
        
            {{---- Delete -----}}							<!-- Enlace para eliminar el tipo de tarea -->
            {{ Form::open(['method' => 'DELETE', 'action' => ['TypeController@destroy', $type->id]]) }}
                <a href='javascript:void(0)' onClick='parentNode.submit();return false;'  class="btn-delete2" style="color:#FFF"><i class="fa fa-trash fa-lg"></i></a>
            {{ Form::close() }}
		</div>

	@endforeach

	</div>
	</div>
@stop