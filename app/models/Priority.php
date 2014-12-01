<?php

class Priority extends Eloquent {

	/**
	* Identify relation between Priority and Task
	*/
	public function task() {
        # Priority has many Task
        # Define a one-to-many relationship.
        return $this->hasMany('Task');
    }

    /**
	* When editing or adding a new task, we need a select dropdown of priorities to choose from
	* A select is easy to generate when you have a key=>value pair to work with
	* This method will generate a key=>value pair of priorities id => priority description
	*
	* @return Array
	*/
    public static function getIdNamePair() {	//Función para obtener los datos de la tabla Prioridades

		$priorities = Array();

		$collection = Priority::all();

		foreach($collection as $priority) {
			$priorities[$priority->id] = $priority->description;
		}

		return $priorities;
	}


}