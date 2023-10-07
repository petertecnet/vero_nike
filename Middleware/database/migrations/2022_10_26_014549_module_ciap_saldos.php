<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModuleCiapSaldos extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_ciap_saldos', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->unsignedTinyInteger('exported')->default(0);
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->bigInteger('log_import_id')->nullable()->references('id')->on('log_import');
			$table->bigInteger('log_export_id')->nullable()->references('id')->on('log_export');

			$table->string('codigo_ativo_sap', 255)->nullable();
			$table->string('parcela', 255)->nullable();
			$table->timestamp('data_credito')->nullable();
			$table->string('saldo_icms', 255)->nullable();
			$table->string('total_saidas', 255)->nullable();
			$table->string('saídas_tributadas_exportacao', 255)->nullable();
			$table->string('indice_apropriacao', 255)->nullable();
			$table->string('valor_parcela', 255)->nullable();
			$table->string('valor_apropriado_parcela', 255)->nullable();

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
		Schema::dropIfExists('module_ciap_saldos');
	}
}
