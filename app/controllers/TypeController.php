<?php

class TypeController extends \BaseController {


	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		# Only logged in users are allowed here
		$this->beforeFilter('auth');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		$types = Type::all();
		return View::make('type_index')->with('types',$types);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('type_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {		//Función para agregar tipos a la tabla 'Type'

		$type = new Type;
		$type->description = Input::get('description');		//Se obtienen los campos, aquí la descripció	
		$type->icon_url = Input::get('icon_url');			//Aquí la url del icono o imagen
		$type->save();										//Se guardan los datos

		return Redirect::action('TypeController@index')->with('flash_message','Your type been added.'); //Se envía mensaje
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {

		try {
			$type = Type::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/type')->with('flash_message', 'Type not found');
		}

		return View::make('type_show')->with('type', $type);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {

		try {
			$type = Type::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/type')->with('flash_message', 'Type not found');
		}

		# Pass with the $tag object so we can do model binding on the form
		return View::make('type_edit')->with('type', $type);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {			//Función para actualizar los datos de la tabla 'Types'

		try {
			$type = Type::findOrFail($id);	//Función para obtener el id de la tabla 'Types'
		}
		catch(Exception $e) {
			return Redirect::to('/type')->with('flash_message', 'Type not found');	//Si no lo encuentra envía mensaje
		}

		$type->description = Input::get('description');	//obtiene el dato del 'input' de descripción del tipo de tarea
		$type->icon_url = Input::get('icon_url');		//obtiene la url del icono para el tipo de tarea
		$type->save();

		return Redirect::action('TypeController@index')->with('flash_message','Your type has been saved.'); 
		//Guarda los cambios y envía mensaje

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {

		try {
			$type = Type::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/type')->with('flash_message', 'Type not found');
		}

		# Note there's a `deleting` Model event which makes sure book_tag entries are also destroyed
		# See Tag.php for more details
		Type::destroy($id);

		return Redirect::action('TypeController@index')->with('flash_message','Your type has been deleted.');

	}


}