<?php

class IndexController extends BaseController {

	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

	}
	
	
	public function getIndex() {
		
		//Obtiene la vista que se mostrará en el index o al inicio de la sesión (login)
		
		if (Auth::check())					//Si está logueado
		{		
			$users = Auth::user()->getId(); //Obtiene y compara el id del usuario
			$tasks = Task::inbox($users);	
			
			return View::make('task_inbox')	//Regresa la vista en task_inbox (tareas pendientes del usuario)
					->with('tasks', $tasks);	
		
		}	else {
				
			return View::make('index');		//Si no está logueado el usuario, regresa la vista default del index
		}
			
	}
	
	

}