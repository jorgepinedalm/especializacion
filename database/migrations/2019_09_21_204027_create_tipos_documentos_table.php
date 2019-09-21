<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTiposDocumentosTable extends Migration {

	public function up()
	{
		Schema::create('tipos_documentos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 455);
			$table->string('abbr', 50)->nullable();
			$table->boolean('estado');
		});
	}

	public function down()
	{
		Schema::drop('tipos_documentos');
	}
}