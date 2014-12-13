@extends('_master')

@section('title')
	Add a new task
@stop

@section('content')

	<div class="inbox">
	<div class="tx-h">Add a new task</div>
    <div class="forma">
    <table class="table-form">
	{{ Form::open(array('url' => '/task/create')) }}
		
        <tr>
        	<td class="col1">{{ Form::label('name','Name') }}</td>	
			<td class="col2">{{ Form::text('name'); }}</td>			
		</tr>
        <tr>
			<td class="col1">{{ Form::label('priority_id', 'Priority') }}</td>		
			<td class="col2">{{ Form::select('priority_id', $priorities, array('class' => 'ui-selectmenu-menu')) }}	</td>	
        </tr>
        <tr>
        	<td class="col1">{{ Form::label('type_id', 'Type') }}</td>		
			<td class="col2">{{ Form::select('type_id', $types); }}	</td>	
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
        	<td class="col2">{{ Form::text('date', null, array(		
        
        'type' => 'text', 			
        'class' => 'form-control',	
        'placeholder' => 'Pick the date this task should be completed',	
        'id' => 'datepicker'))}}	</td>		
        </tr>
		<tr><td colspan="2">
        {{ Form::hidden('user_id',  Auth::user()->id); }}	
		<br /><br />
		<div align="center">{{ HTML::decode(Form::button('<i class="fa fa-plus fa-lg"></i>&nbsp;&nbsp;Add', array('type' => 'submit','class' => 'login'))) }}</div>
 	</td></tr>
    
	{{ Form::close() }}</table>
    </div></div>
@stop
