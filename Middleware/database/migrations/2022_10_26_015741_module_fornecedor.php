<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModuleFornecedor extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_fornecedores', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->unsignedTinyInteger('exported')->default(0);
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->bigInteger('log_import_id')->nullable()->references('id')->on('log_import');
			$table->bigInteger('log_export_id')->nullable()->references('id')->on('log_export');

			$table->string('codigo_cliente', 255)->nullable();
			$table->string('nome_cliente', 255)->nullable();
			$table->string('nome_fantasia', 255)->nullable();
			$table->string('tipo_cadastro', 20)->nullable();
			$table->string('ddd', 5)->nullable();
			$table->string('telefone', 20)->nullable();
			$table->string('email', 200)->nullable();
			$table->integer('grupo_clientes')->nullable();
			$table->string('cnpj', 20)->nullable();
			$table->string('inscricao_estadual', 50)->nullable();
			$table->string('inscricao_municipal', 50)->nullable();
			$table->string('cpf', 20)->nullable();
			$table->string('tipo_endereco_a', 30)->nullable();
			$table->string('nome_endereco_a', 255)->nullable();
			$table->string('tipo_logradouro_a', 50)->nullable();
			$table->string('endereco_a', 255)->nullable();
			$table->string('numero_a', 255)->nullable();
			$table->string('bairro_a', 255)->nullable();
			$table->string('cep_a', 10)->nullable();
			$table->string('complemento_a', 255)->nullable();
			$table->string('cidade_a', 255)->nullable();
			$table->string('estado_a', 255)->nullable();
			$table->string('pais_a', 255)->nullable();
			$table->string('indicador_inscricao_estadual', 255)->nullable();
			$table->string('tipo_endereco_b', 30)->nullable();
			$table->string('nome_endereco_b', 255)->nullable();
			$table->string('tipo_logradouro_b', 50)->nullable();
			$table->string('endereco_b', 255)->nullable();
			$table->string('numero_b', 255)->nullable();
			$table->string('bairro_b', 255)->nullable();
			$table->string('cep_b', 10)->nullable();
			$table->string('complemento_b', 255)->nullable();
			$table->string('cidade_b', 255)->nullable();
			$table->string('estado_b', 255)->nullable();
			$table->string('pais_b', 255)->nullable();
			$table->string('tipo_assinante', 255)->nullable();
			$table->string('tipo_cliente', 255)->nullable();
			
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
		Schema::dropIfExists('module_fornecedores');
	}
}
