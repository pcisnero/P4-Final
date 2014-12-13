<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('types', function($table) {

			# AI, PK
			$table->increments('id');	//Definir llave primaria con autoincremento segun se insertan los datos 
 
			# created_at, updated_at columns
			$table->timestamps();	
			//Define los campos para guardar la fecha y hora en que se inserta y actualiza el dato
 
			# General data...
			$table->string('description');	//Definir un campo tipo texto para descripción del tipo de tarea o prioridad
			$table->string('icon_url');	//Definir un campo tipo texto para la url del icono del tipo de tarea o prioridad
			
			# Define foreign keys...
			# none needed

		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('types');
	}

}
