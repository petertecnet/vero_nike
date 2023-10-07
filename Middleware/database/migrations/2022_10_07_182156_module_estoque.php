<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModuleEstoque extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	//REUTILIZAR PARA IMPORT CSV
	//REUTILIZAR PARA IMPORT CSV
	//REUTILIZAR PARA IMPORT CSV

	public function up()
	{
		Schema::create('module_estoque', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->unsignedTinyInteger('exported')->default(0);
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->bigInteger('log_import_id')->nullable()->references('id')->on('log_import');
			$table->bigInteger('log_export_id')->nullable()->references('id')->on('log_export');

			$table->string('codigo_cliente', 50)->nullable();								#Número Sequencial, sempre iniciando em 1
			// $table->string('doc_entry', 255)->nullable();								#Não Preencher
			// $table->string('doc_type', 15)->nullable()->default('dDocument_Items');
			$table->string('address_mame', 255)->nullable();
			$table->string('doc_date', 8)->nullable();										#Data sempre padrão americano - AAAAMMDD
			$table->string('doc_due_date', 8)->nullable();									#Data sempre padrão americano - AAAAMMDD
			$table->string('tax_date', 8)->nullable();										#Data sempre padrão americano - AAAAMMDD
			$table->string('card_code', 50)->nullable();									#Código do cliente (mesmo cadastrado no SAP)
			$table->string('sequence_code', 10)->nullable();								#Número interno da sequencia de númeração. Como os números devem ser seguidos do sistema, enviar padrão -2
			$table->string('comments', 255)->nullable();
			$table->string('bpl_id_assigned_to_invoice', 20)->nullable();					#Preencher com CNPJ de Faturamento;
			$table->string('jrnl_memo', 255)->nullable();
			$table->string('sequence_serial', 20)->nullable();								#Informar o número da nota fiscal
			$table->string('series_str', 20)->nullable();									#Informar a Série da Nota Fiscal
			$table->string('sequence_model', 5)->nullable();								#Preencher com Modelo da NF: NFe = 39
			$table->string('chave_acesso', 50)->nullable();									#Preencher com Modelo da NF: NFe = 39
			$table->string('num_os', 20)->nullable();										#ID da fatura gerada no sistema. Link entre os sistemas. Deve ser único por nota, repetir em todos os itens da Nota fiscal.
			$table->string('num_cont', 20)->nullable();
            $table->string('LineNum', 20)->nullable();
			$table->string('item_code', 20)->nullable();
			$table->string('item_description', 20)->nullable();
			$table->string('mac_serie', 20)->nullable();
			$table->string('whs_code', 20)->nullable();
			$table->string('usage', 20)->nullable();
			$table->string('quantity', 20)->nullable();
			$table->string('unit_price', 20)->nullable();									#Valor deve ser sempre informado com o separador decimal como ponto.
			$table->string('tax_code', 20)->nullable();										#Caso não informado código de imposto, será utilizado da Determinação fiscal.

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
		Schema::dropIfExists('module_estoque');
	}
}
