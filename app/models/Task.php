<?php

class Task extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * Task belongs to Priority
    * Define an inverse one-to-many relationship.
    */
	public function priority() {

        return $this->belongsTo('Priority');	//Relación de las prioridades a tareas

    }
	

    /**
    * Tasks belong to Type
    */
    public function type() {

        return $this->belongsTo('Type');		//Relación de tipos de tareas a tareas

    }
	
	
    /**
    * Search among tasks, priorities and types
    * @return Collection
    */
    public static function search($query,$users) {		//Función para buscar segun la consulta, en caso de no haber búsqueda 
														//obtiene el listado de tareas ordenadas y del usuario logueado.
														//Los parámetros son '$query' o palabra a buscar y '$users' usuario logueado
		if($query) {
			
            $tasks = Task::with('type','priority')		//Tiene en cuenta el tipo y prioridad para devolver los datos (tablas)
			->WhereHas('priority', function($q) use($query,$users) {
			   $q->where('description', 'LIKE', "%$query%")		//Y dentro de la tabla compara la 'descripcion' con la de busqueda
			     ->where('user_id', '=', $users)				//Indicando devolver solo las del usuario logueado
				 ->orderBy('date', 'DESC')->orderBy('priority_id', 'ASC');  //Y ordenando por fecha mas reciente y prioridad
            })
            ->orWhereHas('type', function($q) use($query,$users) {		//O en la tabla de prioridades obtiene el valor de la busqueda
				$q->where('description', 'LIKE', "%$query%")
				->where('user_id', '=', $users)
				->orderBy('date', 'DESC')->orderBy('priority_id', 'ASC');
            })
            ->orWhere('name', 'LIKE', "%$query%")	//Si en las tablas de Prioridad y Tipo no encontró valor que coincida,
													//buscará en los valores de texto de la tabla de Tareas (Nombre en éste caso)
			->orWhere('date', '=', "$query")		//Compara el valor buscado si es una fecha (yyyy-mm-dd)
			->where('user_id', '=', $users)			//Indicando devolver solo las del usuario logueado
			->orderBy('date', 'DESC')->orderBy('priority_id', 'ASC') //Ordenando por fecha mas reciente  y prioridad
            ->get();

            # Note on what `use` means above:
            # Closures may inherit variables from the parent scope.
            # Any such variables must be passed to the `use` language construct.
        }
        
        else {
            											//Si no hay busqueda regresa todos los registros de Tareas
            $tasks = Task::with('type','priority')		//Incluyendo los valores de tipo y prioridad
			->where('user_id', '=', $users)				//Indicando mostrar solo las del usuario logueado (user_id y id [users])
			->orderBy('date', 'DESC')					//Ordenando primero por fecha
			->orderBy('priority_id', 'ASC')->get();		//y posterior ordenar por prioridad
        }

        return $tasks;									//Regresa la colección de datos ya sea por búsqueda o sin ella
    }
	
	
	
	/**
    * Search among tasks, priorities and types
    * @return Collection
    */
    public static function tcompleted($users) {		//Se cambió el nombre de la funcion para tareas completas
		
        if($users) {								//Si la variable retorna valor entonces entra
          
            $tasks = Task::with('type','priority')	//Obtiene los datos de las tablas de prioridad y tipo
			->where('user_id', '=', $users)			//Compara con el id del usuario logueado
			->where('complete', '=', 1)				//Se especifica regresar tareas completas
			->orderBy('date', 'DESC')				//Se ordena por fecha mas reciente
			->orderBy('priority_id', 'ASC')->get();	//Y posterior por prioridad
        }

        return $tasks;			//Regresa los valores en la variable
    }
	
	
	/**
    * Search among tasks, priorities and types
    * @return Collection
    */
    public static function inbox($users) {	//Se cambia el nombre de la función
		
        if($users) {								//Si la variable retorna valor entonces entra
            $tasks = Task::with('type','priority')	//Obtiene los datos de las tablas de prioridad y tipo
			->where('user_id', '=', $users)			//Compara con el id del usuario logueado
			->where('complete', '=', 0)				//Se define para tareas no completas
			->orderBy('date', 'DESC')				//Se ordena por fecha mas reciente
			->orderBy('priority_id', 'ASC')->get();	//Y posterior por prioridad
        }

        return $tasks;	//Regresa los valores en la variable
    }
	
	


}