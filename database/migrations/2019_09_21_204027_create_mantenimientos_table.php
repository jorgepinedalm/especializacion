<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMantenimientosTable extends Migration {

	public function up()
	{
		Schema::create('mantenimientos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('codigo', 150)->unique();
			$table->string('titulo', 455);
			$table->text('detalle');
			$table->integer('categoria_id')->unsigned();
			$table->datetime('fecha_asignada');
			$table->double('duracion');
			$table->string('responsable', 455);
			$table->boolean('estado');
			$table->integer('estado_id')->unsigned();
			$table->integer('apartamento_residente_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('mantenimientos');
	}
}