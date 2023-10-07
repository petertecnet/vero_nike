<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModuleCiapDocumentos extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_ciap_documentos', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->unsignedTinyInteger('exported')->default(0);
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->bigInteger('log_import_id')->nullable()->references('id')->on('log_import');
			$table->bigInteger('log_export_id')->nullable()->references('id')->on('log_export');

			$table->string('codigo_ativo_sap', 255)->nullable();
			$table->timestamp('data_documento')->nullable();
			$table->string('codigo_participante', 255)->nullable();
			$table->string('chave_acesso', 255)->nullable();
			$table->string('numero_nf', 255)->nullable();
			$table->string('serie', 255)->nullable();
			$table->string('modelo', 255)->nullable();
			$table->string('linha', 255)->nullable();
			$table->string('item_nf', 255)->nullable();
			$table->string('quantidade', 255)->nullable();
			$table->string('unidade_medida', 255)->nullable();
			$table->string('icms_operação_propria', 255)->nullable();
			$table->string('icms_st', 255)->nullable();
			$table->string('icms_frete', 255)->nullable();
			$table->string('icms_diferencial_aliquota', 255)->nullable();
			$table->string('tipo_documento', 255)->nullable();
			$table->string('doc_cntry', 255)->nullable();

			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('module_ciap_documentos');
	}
}
