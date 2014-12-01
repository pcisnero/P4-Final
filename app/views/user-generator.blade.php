<?php
$paragraphs = e(Input::get('paragraphs'));

$generator = new Badcow\LoremIpsum\Generator();
$paragraphs1 = $generator->getParagraphs($paragraphs);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Generator</title>
    
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	
	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cerulean/bootstrap.min.css" rel="stylesheet">
    
   <link rel="stylesheet" href="{{ URL::asset('/') }}css/mystyle.css" />.
	
	<style>
		a:link {
			text-decoration:underline;
		}
			
		.container {
			margin-top:15px;
		}
	
		.users {
			margin-top:15px;
		}
	
		.user {
			margin-bottom:5px;
		}
		
		input[type=text] {
			width:35px;
		}
	
		.name {
			font-weight:bold;
		}
		
		.profile {
			font-style:italic;
		}

		
	</style>
	
    
    
</head>
    
<body>
  		<div class='container'>

		
	<a href='/'>&larr; Home</a>
	
	<h1>User Generator</h1>
	
				{{ Form::open() }}
 
                {{ Form::label('users', 'How many users?') }}
                {{ Form::text('users', '5', array('id' => 'users', 'maxlength' => 2,)) }} (Max: 99)
                <br>
 
                Include...
				<br>
                {{ Form::checkbox('birthdate', null) }} {{ Form::label('birthdate', 'Birthdate') }}<br>
                {{ Form::checkbox('profile', null) }} {{ Form::label('profile', 'Profile') }}<br>
                
                {{ Form::token()}}
                {{ Form::submit('Generate') }}
 				{{ Form::close() }}
 
					   
 
 		<hr>
        <?php
		
		echo implode('<p>', $paragraphs1);
		
		?>
		
</div>

</body>
      '>

</html>


 
        
        
                