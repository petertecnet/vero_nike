<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModuleComodato extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_comodato', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->unsignedTinyInteger('exported')->default(0);
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->bigInteger('log_import_id')->nullable()->references('id')->on('log_import');
			$table->bigInteger('log_export_id')->nullable()->references('id')->on('log_export');

			$table->string('id_item', 255)->nullable();
			#$table->string('doc_entry', 255)->nullable();
			#$table->string('tipo_documento', 255)->nullable();
			$table->string('nome_endereco', 255)->nullable();
			$table->timestamp('data_documento')->nullable();
			$table->timestamp('data_vencimento')->nullable();
			$table->timestamp('data_emissao')->nullable();
			$table->string('codigo_cliente', 255)->nullable();
			#$table->string('sequencia_numeracao_sap', 255)->nullable();
			$table->text('comentarios')->nullable();
			$table->string('cnpj', 50)->nullable();
			$table->text('observacoes_contabilidade')->nullable();
			$table->string('numero_nota', 255)->nullable();
			$table->string('serie_nota', 255)->nullable();
			#$table->string('modelo_nota', 255)->nullable();
			$table->string('chave_acesso_nfe', 255)->nullable();
			$table->string('numero_os', 255)->nullable();
			$table->string('numero_contrato', 255)->nullable();
			$table->string('numero_linha_item', 255)->nullable();
			$table->string('codigo_item_sap', 255)->nullable();
			$table->string('descricao_item', 255)->nullable();
			$table->string('numero_mac', 255)->nullable();
			$table->string('codigo_deposito', 255)->nullable();
			$table->string('utilizacao', 255)->nullable();
			$table->integer('quantidade')->nullable();
			$table->string('valor_unitario', 255)->nullable();
			$table->string('codigo_imposto', 255)->nullable();
			
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
		Schema::dropIfExists('module_comodato');
	}
}
