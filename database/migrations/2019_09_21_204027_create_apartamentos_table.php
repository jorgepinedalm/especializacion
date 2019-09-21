<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApartamentosTable extends Migration {

	public function up()
	{
		Schema::create('apartamentos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('numero');
			$table->integer('floor');
			$table->double('area');
			$table->integer('torre');
			$table->boolean('estado');
		});
	}

	public function down()
	{
		Schema::drop('apartamentos');
	}
}