<?php

class Type extends Eloquent {

	# Enable fillable on the 'name' column so we can use the Model shortcut Create
	protected $fillable = array('description');

    public function tasks() {								//Relación de tareas con tipo
        # Types belong to many Tasks
        return $this->hasMany('Task');
    }


	# Model events...
	# http://laravel.com/docs/eloquent#model-events
	public static function boot() {							//Función para eliminar algún tipo de tarea comparando ID

        parent::boot();

        static::deleting(function($type) {
            DB::statement('DELETE FROM types WHERE id = ?', array($type->id));
        });

	}
	
	
	public static function getIdNamePairT() {				//Función para obtener los datos de la tabla 'Type'

		$types = Array();

		$collectiont = Type::all();

		foreach($collectiont as $type) {
			$types[$type->id] = $type->description;
		}

		return $types;
	}

}