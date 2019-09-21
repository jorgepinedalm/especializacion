<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('residentes', function(Blueprint $table) {
			$table->foreign('tipo_documento_id')->references('id')->on('tipos_documentos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('residentes', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('apartamentos_residentes', function(Blueprint $table) {
			$table->foreign('apartamento_id')->references('id')->on('apartamentos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('apartamentos_residentes', function(Blueprint $table) {
			$table->foreign('residente_id')->references('id')->on('residentes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('mantenimientos', function(Blueprint $table) {
			$table->foreign('categoria_id')->references('id')->on('categorias')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('mantenimientos', function(Blueprint $table) {
			$table->foreign('estado_id')->references('id')->on('estados_mantenimientos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('mantenimientos', function(Blueprint $table) {
			$table->foreign('apartamento_residente_id')->references('id')->on('apartamentos_residentes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('residentes', function(Blueprint $table) {
			$table->dropForeign('residentes_tipo_documento_id_foreign');
		});
		Schema::table('residentes', function(Blueprint $table) {
			$table->dropForeign('residentes_user_id_foreign');
		});
		Schema::table('apartamentos_residentes', function(Blueprint $table) {
			$table->dropForeign('apartamentos_residentes_apartamento_id_foreign');
		});
		Schema::table('apartamentos_residentes', function(Blueprint $table) {
			$table->dropForeign('apartamentos_residentes_residente_id_foreign');
		});
		Schema::table('mantenimientos', function(Blueprint $table) {
			$table->dropForeign('mantenimientos_categoria_id_foreign');
		});
		Schema::table('mantenimientos', function(Blueprint $table) {
			$table->dropForeign('mantenimientos_estado_id_foreign');
		});
		Schema::table('mantenimientos', function(Blueprint $table) {
			$table->dropForeign('mantenimientos_apartamento_residente_id_foreign');
		});
	}
}