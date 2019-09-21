<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApartamentosResidentesTable extends Migration {

	public function up()
	{
		Schema::create('apartamentos_residentes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('apartamento_id')->unsigned();
			$table->integer('residente_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('apartamentos_residentes');
	}
}