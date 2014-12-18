<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function($table) {

			# AI, PK
			$table->increments('id'); //Definimos la Llave primaria(PK) con autoincrement (aumenta segun se insertan datos).
			
			# created_at, updated_at columns
			$table->timestamps(); 
			//Crea 2 campos guardando la fecha y hora de insertar el dato (created_at) y modificado (updated_at)
			
			# General data...
			$table->integer('user_id')->unsigned(); //para definir llave forárea de usuarios registrados
			$table->integer('type_id')->unsigned(); //definir llave foranea de tipo de tarea 
			$table->integer('priority_id')->unsigned(); //definir llave foranea para prioridad de tarea
			// integer para valores numericos enteros
			
			# Important! FK has to be unsigned because the PK it will reference is auto-incrementing
			$table->date('date'); //definir un campo 'date' para guardar la fecha de la tarea a realizar (yyyy-mm-dd)
			$table->string('name',255);	//definir valor cadena o 'texto' para nombre de la tarea (máx. 255 caracteres)
			$table->integer('complete'); //definir valor entero para tarea completada 1 para completada, 0 para no completada
			
			# Define foreign keys...
			$table->foreign('user_id')->references('id')->on('users'); 
			//llave foranea definida como 'user_id' haciendo referencia al campo 'id' y tabla 'users'
			
			$table->foreign('type_id')->references('id')->on('types');
			//llave foranea definida como 'type_id' haciendo referencia al campo 'id' y tabla 'types'
			
			$table->foreign('priority_id')->references('id')->on('priorities');
			//llave foranea definida como 'priority_id' haciendo referencia al campo 'id' y tabla 'priorities'
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}