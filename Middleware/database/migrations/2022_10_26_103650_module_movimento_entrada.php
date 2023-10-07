<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModuleMovimentoEntrada extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_movimento_entrada', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->unsignedTinyInteger('exported')->default(0);
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->bigInteger('log_import_id')->nullable()->references('id')->on('log_import');
			$table->bigInteger('log_export_id')->nullable()->references('id')->on('log_export');

			$table->string('id_movimento', 100)->nullable();
			#$table->string('doc_entry', 100)->nullable();
			$table->timestamp('data_documento')->nullable();
			$table->string('codigo_cliente', 100)->nullable();
			$table->text('comentarios')->nullable();
			$table->string('cnpj', 50)->nullable();
			$table->text('observacoes_contabilidade')->nullable();
			$table->string('numero_os', 255)->nullable();
			$table->string('numero_contrato', 255)->nullable();
			$table->string('numero_linha_item', 255)->nullable();
			$table->string('codigo_item_sap', 255)->nullable();
			$table->text('descricao_item')->nullable();
			$table->string('numero_mac_serie', 255)->nullable();
			$table->string('codigo_deposito', 255)->nullable();
			$table->integer('quantidade')->nullable();
			#$table->decimal('valor_unitário', 8, 2)->nullable();
			
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
		Schema::dropIfExists('module_movimento_entrada');
	}
}
