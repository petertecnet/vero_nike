<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModuleFaturamento extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_faturamento', function (Blueprint $table) {

			$table->bigIncrements('id');
			$table->unsignedTinyInteger('exported')->default(0);
			$table->bigInteger('company_id')->nullable()->references('id')->on('company');
			$table->bigInteger('log_import_id')->nullable()->references('id')->on('log_import');
			$table->bigInteger('log_export_id')->nullable()->references('id')->on('log_export');

			$table->string('id_faturamento', 255)->nullable();								#Número Sequencial, sempre iniciando em 1.
			// $table->string('doc_entry', 255)->nullable();								#Não Preencher
			// $table->string('doc_type', 15)->nullable()->default('dDocument_Items');		#Tipo Documento SAP. Manter sempre dDocument_Items
			$table->string('cancelada', 1)->nullable();										#Nota cancelada? S ou N, caso S, o sistema irá procurar a nota no SAP e realizar o cancelamento. Logo, faturamento novo sempre vir como N.
			$table->string('address_name', 255)->nullable();
			$table->timestamp('doc_date')->nullable();									#Data sempre padrão americano - AAAAMMDD.
			$table->timestamp('doc_due_date')->nullable();								#Data sempre padrão americano - AAAAMMDD.
			$table->timestamp('tax_date')->nullable();									#Data sempre padrão americano - AAAAMMDD.
			$table->string('card_code', 100)->nullable();									#Código do cliente (mesmo cadastrado no SAP).
			#$table->string('sequence_code', 10)->nullable();							#Número interno da sequencia de númeração. Como os números devem ser seguidos do sistema, enviar padrão -2.
			$table->string('comments', 255)->nullable();
			$table->string('bpl_id_assigned_to_invoice', 20)->nullable();					#Preencher com CNPJ de Faturamento;
			$table->string('jrnl_memo', 255)->nullable();
			$table->string('sequence_serial', 50)->nullable();								#Informar o número da nota fiscal
			$table->string('series_str', 50)->nullable();									#Informar a Série da Nota Fiscal;
			$table->string('sequence_model', 2)->nullable();								#Preencher com Modelo da NF: Modelo 21 = 18 ; Modelo 22 = 19 ; NFSe = 46; NFe = 39; Nota de Débito = 59;
			$table->string('chave_acesso', 100)->nullable();								#Preencher somente se usar o Modelo 39 - NFe
			$table->string('chave_verificacao', 100)->nullable();							#Preencher somente se usar o Modelo 46 - NFSe
			$table->string('chave_autenticacao', 100)->nullable();							#Preencher somente se usar o Modelo 18 - Modelo 21 ou 19 - Modelo 22;
			$table->string('line_num', 5)->nullable();
			$table->string('item_code', 5)->nullable();
			$table->string('item_description', 255)->nullable();
			$table->string('whs_code', 255)->nullable();
			#$table->string('usage', 5)->nullable();
			$table->string('quantity', 5)->nullable();
			$table->string('unit_price', 10)->nullable();									#Valor deve ser sempre informado com o separador decimal como ponto.
			$table->string('acct_code', 100)->nullable();									#Caso não informado conta, será utilizado da Determinação contábil.
			$table->string('id_docext', 100)->nullable();									#ID da fatura gerada no sistema. Link entre os sistemas. Deve ser único por nota, repetir em todos os itens da Nota fiscal.
			$table->string('tax_code', 100)->nullable();									#Caso não informado código de imposto, será utilizado da Determinação fiscal.
			$table->string('f100_pis', 100)->nullable();									#Caso nota de débito, com Tributação de PIS e COFINS, preencher com F100;
			$table->string('f100_op', 100)->nullable();										#Preencher com 0, 1 ou 2: 0 - Operação Representativa de Aquisição Custos Despesa ou Encargos Sujeita à Incidência de Crédito de PIS/Pasep ou Cofins ; 1 - Operação Representativa de Receita Auferida Sujeita ao Pagamento da Contribuição para o PIS/Pasep e da Cofins ; 2 - Operação Representativa de Receita Auferida Não Sujeita ao Pagamento da Contribuição para o PIS/Pasep e da Cofins
			$table->string('f100_tr', 100)->nullable();										#Prencher com 0 ou 1: 0 - Operação no Mercado Interno ; 1 -  Operação de Importação
			
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
		Schema::dropIfExists('module_faturamento');
	}
}
