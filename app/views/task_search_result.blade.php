<section>
	<img class='image' src='{{ $task['priority']->icon_url }}'>

	<h2>{{ $task['name'] }}</h2>

	<p>
	{{ $task['priority']->description }} {{ $task['complete'] }}
	</p>

	<p>
		@foreach($task['types'] as $type)
			{{ $type->description }}
		@endforeach
	</p>

	
	<br>
	<a href='/task/edit/{{ $task->id }}'>Edit</a>
</section>