<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadosMantenimientosTable extends Migration {

	public function up()
	{
		Schema::create('estados_mantenimientos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 455);
		});
	}

	public function down()
	{
		Schema::drop('estados_mantenimientos');
	}
}