<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','TaskManager')</title>
	<meta charset='utf-8'>

	<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
	<link rel='stylesheet' href='/css/taskmanager.css' type='text/css'>

	@yield('head')


</head>
<body>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	<a href='/'><img class='logo' src='/images/task-logo.jpg' alt='TaskManager logo'></a>

	<nav>
		<ul>
        <!-- Verifica si el usuario está logueado, si es asi, visualiza el menu-->
		@if(Auth::check())
			<li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
            <li><a href='/task'>All Task</a></li>
			<li><a href='/task/create'>+ Add Task</a></li>
            <li><a href='/task/nocomplete'>Pending Task</a></li>            
            <li><a href='/task/completed'>Completed task</a></li>                 
			<li><a href='/type'>Types</a></li>			
            <li><div>
            <!--  Form para busqueda -->
            {{ Form::open(array('url' => '/task', 'method' => 'GET')) }}
                {{ Form::label('query','Search') }}        
                {{ Form::text('query'); }}        
                {{ Form::submit('Search'); }}        
            {{ Form::close() }}
        </div></li>
		@else <!-- si el usuario no está logueado visualiza para registrarse o login -->
			<li><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></li>
		@endif
		</ul>
	</nav>
	
    
	

	@yield('content')

	@yield('/body')

</body>
</html>





