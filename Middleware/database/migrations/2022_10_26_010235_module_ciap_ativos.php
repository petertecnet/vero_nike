<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModuleCiapAtivos extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_ciap_ativos', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->unsignedTinyInteger('exported')->default(0);
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->bigInteger('log_import_id')->nullable()->references('id')->on('log_import');
			$table->bigInteger('log_export_id')->nullable()->references('id')->on('log_export');

			$table->string('codigo_ativo_sap', 255)->nullable();
			$table->string('status', 255)->nullable();
			$table->timestamp('data_aquisicao')->nullable();
			$table->string('numero_parcelas', 255)->nullable();
			$table->string('tipo_bem', 255)->nullable();
			$table->string('item_principal', 255)->nullable();
			$table->string('codigo_conta', 255)->nullable();
			$table->string('código_centro_custo', 255)->nullable();
			$table->string('função_bem', 255)->nullable();
			$table->string('vida_util', 255)->nullable();
			$table->string('código_item_sap', 255)->nullable();
			$table->string('sequencial', 255)->nullable();
			
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
		Schema::dropIfExists('module_ciap_ativos');
	}
}
