<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','TaskManager')</title>
    <link rel='shortcut icon' href='images/icon-tm.ico' >
	<meta charset='utf-8'>

	
    <link rel="stylesheet" href="/css/jquery-ui.css">
	<script src="/js/jquery.js"></script>
	<script src="/css/jquery-ui.js"></script>
    
    <link rel='stylesheet' href='/css/taskmanager.css' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


	@yield('head')


</head>
<body class="bg">

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>        
	@endif

        @if(Auth::check())
        <div class="line-up"></div>
    	<div class="logo-h"><a href='/'><img class='logo-h' src='/images/task-logo-h.png' alt='TaskManager logo'></a></div>
        
        <div id='search'>           
           {{ Form::open(array('url' => '/task', 'method' => 'GET')) }}
           {{ Form::text('query', null, array('placeholder' => 'Search', 'id' => 'query')) }}
           {{ HTML::decode(Form::button('<i class="fa fa-search fa-lg"></i>', array('type' => 'submit','class' => 'login'))) }}
           {{ Form::close() }}                
        </div>        
        
    <div id="cont-ini">       	
        
     <nav>
		<ul>   
        	<li><a href='/task/inbox'><i class="fa fa-inbox fa-lg"></i>&nbsp;&nbsp;Inbox</a></li>            
			<li><a href='/task/create'><i class="fa fa-plus-circle fa-lg"></i>&nbsp;&nbsp; Add Task</a></li>                        
            <li><a href='/task/completed'><i class="fa fa-check-circle fa-lg"></i>&nbsp;&nbsp;Completed task</a></li> 
            <li><a href='/task'><i class="fa fa-list fa-lg"></i>&nbsp;&nbsp;All tasks</a></li>                
			<li><a href='/type'><i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;Type of task</a></li>
     	</ul>
	</nav>   
        
        
        <div class="logout"><a href='/logout' class="btn-login"><i class="fa fa-sign-out fa-lg"></i>&nbsp;&nbsp;<b>Log out</b> {{ Auth::user()->email; }}</a></div>
        
    </div>
    <div class="tx-1">Welcome to taskManager</div>
    <div class="tx-2">All your projects and activities in one place</div>
    <br><br>
		@else 
               <div align="center"><div class="logo"><a href='/'><img class='logo' src='/images/task-logo-ini.png' alt='TaskManager logo'></a></div></div>
               <div class="wellcome">Wellcome to TaskManager</div>
               <br>
               <div class="tx" style="margin-bottom:10px;">Record all your activities and projects to be implemented </div>
            </div>
               
            
		@endif
        @yield('content')
		
	
    
	

	
		<div id="bg"></div>
	@yield('/body')

</body>
</html>





