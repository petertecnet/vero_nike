<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModuleRecebimento extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */


	public function up()
	{
		Schema::create('module_recebimento', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->unsignedTinyInteger('exported')->default(0);
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->bigInteger('log_import_id')->nullable()->references('id')->on('log_import');
			$table->bigInteger('log_export_id')->nullable()->references('id')->on('log_export');

			$table->string('id_item', 255)->nullable();
			#$table->string('DocEntry', 255)->nullable();
			$table->string('cnpj', 255)->nullable();
			$table->timestamp('data_pagamento')->nullable();
			$table->string('codigo_cliente', 255)->nullable();
			$table->string('codigo_externo_pagamento', 255)->nullable();
			$table->string('conta_contabil', 255)->nullable();
			$table->string('carteira', 255)->nullable();
			$table->string('banco', 50)->nullable();
			$table->string('agencia', 50)->nullable();
			$table->string('conta', 50)->nullable();
			$table->decimal('pagamento_total', 8, 2)->nullable();
			$table->text('comentarios')->nullable();
			$table->string('obs_diario', 255)->nullable();
			#$table->string('tipo_documento', 255)->nullable();
			$table->string('numero_linha', 255)->nullable();
			$table->string('modelo', 255)->nullable();
			$table->string('numero_nf', 255)->nullable();
			$table->string('serie_nf', 255)->nullable();
			$table->string('id_fatura_sistema', 255)->nullable();
			$table->decimal('valor_documento', 8, 2)->nullable();
			$table->decimal('valor_desconto', 8, 2)->nullable();
			$table->decimal('valor_juros_multa', 8, 2)->nullable();
			$table->decimal('valor_recebido', 8, 2)->nullable();

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
		Schema::dropIfExists('module_recebimento');
	}
}
