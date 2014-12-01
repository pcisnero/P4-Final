<?php

class TaskController extends \BaseController {


	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		$this->beforeFilter('auth', array('except' => 'getIndex'));

	}


	/**
	* Process the searchform
	* @return View
	*/
	public function getSearch() {

		return View::make('task_search');	//Para la búsqueda crea una 'vista' con la ruta task_search

	}


	/**
	* Display all task
	* @return View
	*/
	public function getIndex() {
		
		if (Auth::check()) //Verifica si el usuario está logueado
		{
			 $users = Auth::user()->getId();  //Si el usuario está logueado obtiene el id y lo pasa a la variable $users
		}
		 
		$query  = Input::get('query');			//query es la variable que se obtiene de la caja de texto de busqueda
		$tasks = Task::search($query,$users);	//Se pasan como parametros las variablas de 'query' y 'users' (usuario logueado)
		
			return View::make('task_index')		//Los resultados se observan en task_index
				->with('tasks', $tasks)
				->with('query', $query);				
			
	}
	
	/**
	* Display all task completed
	* @return View
	*/
	public function getCompleted() {	//Se agregó ésta funcion para obtener las tareas completadas
		
		if (Auth::check())
		{
			 $users = Auth::user()->getId();  //Obtiene el ID del usuario logueado
		}
			
		$tasks = Task::tcompleted($users);	//La función se cambió a tcompleted pues las consultas que obtiene sólo traen las tareas
											//que han sido completadas. Ésta función se define en models/Task.php
											//Tiene como parámetro o variable a enviar $users, el usuario logueado
				
		return View::make('task_completed')	//Devuelve una 'vista' de estos datos en 'task_completed'
				->with('tasks', $tasks);			
			

	}
	
	/**
	* Display all task completed
	* @return View
	*/
	public function getNoComplete() { //Se agregó ésta funcion para obtener las tareas no completadas
		
		if (Auth::check())
		{
			 $users = Auth::user()->getId(); //Obtiene el ID del usuario logueado
		}
		
		
		$tasks = Task::tncompleted($users);//La función se cambió a tncompleted pues las consultas que obtiene sólo trae las tareas
										   //que no han sido completadas. Ésta función se define en models/Task.php
										   //Tiene como parámetro o variable a enviar $users, el usuario logueado
			
		return View::make('task_nocomplete')	//Devuelve la 'vista' de los datos en task_nocomplete
				->with('tasks', $tasks);			
			
	}



	/**
	* Show the "Add a task form"
	* @return View
	*/
	public function getCreate() {					//función para crear/agregar la tarea

		$priorities = Priority::getIdNamePair();	//Obtiene la descripción de la prioridad que se muestra en el select
		$types = Type::getIdNamePairT();			//Obtiene la descripción del tipo de tarea
													//Las funciones se definen en models/Type.php y models/Priority.php

    	return View::make('task_add')				//Devuelve los datos en 'task_add'
		->with('priorities',$priorities)			//incluyendo la lista o datos de prioridades
		->with('types',$types);						//y la de tipos

	}


	/**
	* Process the "Add a task form"
	* @return Redirect
	*/
	public function postCreate() {

		# Instantiate the book model
		$task = new Task();

		$task->fill(Input::all());
		$task->save();

		# Magic: Eloquent
		$task->save();

		return Redirect::action('TaskController@getIndex')->with('flash_message','Your task has been added.');

	}


	/**
	* Show the "Edit a task form"
	* @return View
	*/
	public function getEdit($id) {					//Función para editar la tarea (obtiene el id de la tarea)

		try {
		    $task    = Task::findOrFail($id);		//Función para verificar si el id de la tarea existe
		    $priorities = Priority::getIdNamePair();//Función para obtener las prioridades
			$types = Type::getIdNamePairT();		//Función para obtener los tipos de tareas
		}
		catch(exception $e) {
		    return Redirect::to('/task')->with('flash_message', 'Task not found');	//Si no existe envía mensaje
		}

    	return View::make('task_edit')			//Obtiene la 'vista' de los datos en 'task_edit'
    		->with('task', $task)				//Incluyendo datos de la tarea
    		->with('priorities', $priorities)	//datos de prioridades
			->with('types', $types);			//datos de los tipos

	}
	
	
	
	/**
	* Process the "Edit a task form"
	* @return Redirect
	*/
	public function postEdit() {

		try {
	        $task = Task::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/task')->with('flash_message', 'Task not found');
	    }
	    # http://laravel.com/docs/4.2/eloquent#mass-assignment	    
		$task->fill(Input::all());		
	    $task->save();

	   	return Redirect::action('TaskController@getIndex')->with('flash_message','Your changes have been saved.');

	}
	
	
	/**
	* Process the "Edit complete task"
	*/
	public function postEditC() {		// Se crea una función para editar el estado de la tarea (completa o no completa).

		try {
	        $task = Task::findOrFail(Input::get('id', 'complete'));		//Obtiene los valores de la tabla 'tasks': id y complete
	    }
	    catch(exception $e) {
	        return Redirect::to('/task')->with('flash_message', 'Task not complete'); //Si no los encuentra envía mensaje
	    }
	    
		$task = Task::where('id',Input::get('id'))->update(array('complete' => 1)); 
		// Si el valor se encuentra, se crea una variable para la consulta $task donde
		//Task:: es la tabla y a continuación la consulta
		//where... expresado como ('donde el id de la tabla de las tareas sea igual a','id de tarea seleccionada para editar')
		//-->update(array('complete' => 1) -->actualizar(la condición(asignar completa = 1) 
		
	   	return Redirect::action('TaskController@getIndex')->with('flash_message','Task complete'); 
		//Realiza la actualización y envía mensaje

	}


	/**
	* Process task deletion
	*
	* @return Redirect
	*/
	public function postDelete() {

		try {
	        $task = Task::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/task/')->with('flash_message', 'Could not delete task - not found.');
	    }

	    Task::destroy(Input::get('id'));

	    return Redirect::to('/task/')->with('flash_message', 'Task deleted.');

	}


	/**
	* Process a task search
	* Called w/ Ajax
	*/
	public function postSearch() {

		if(Request::ajax()) {

			$query  = Input::get('query');

			# We're demoing two possible return formats: JSON or HTML
			$format = Input::get('format');

			# Do the actual query
	        $tasks  = Task::search($query);

	        # If the request is for JSON, just send the books back as JSON
	        if($format == 'json') {
		        return Response::json($tasks);
	        }
	        # Otherwise, loop through the results building the HTML View we'll return
	        elseif($format == 'html') {

		        $results = '';
				foreach($tasks as $task) {
					# Created a "stub" of a view called book_search_result.php; all it is is a stub of code to display a book
					# For each book, we'll add a new stub to the results
					$results .= View::make('task_search_result')->with('task', $task)->render();
				}

				# Return the HTML/View to JavaScript...
				return $results;
			}
		}
	}



}