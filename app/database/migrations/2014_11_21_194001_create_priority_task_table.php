<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriorityTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('priority', function($table) {

			# AI, PK
			$table->increments('id');
 
			# created_at, updated_at columns
			$table->timestamps();
 
			# General data...
			$table->string('description',255);
			$table->string('icon_url');
			
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
		Schema::drop('priority');
	}

}
