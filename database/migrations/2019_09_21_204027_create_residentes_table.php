<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResidentesTable extends Migration {

	public function up()
	{
		Schema::create('residentes', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('user_id')->unsigned();
			$table->timestamps();
			$table->string('nombre', 455);
			$table->string('apellido', 455);
			$table->integer('tipo_documento_id')->unsigned();
			$table->string('numero_documento', 255);
			$table->string('email', 455);
			$table->boolean('estado');
		});
	}

	public function down()
	{
		Schema::drop('residentes');
	}
}