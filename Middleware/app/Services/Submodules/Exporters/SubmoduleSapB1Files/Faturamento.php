<?php

namespace App\Services\Submodules\Exporters\SubmoduleSapB1Files;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;

use App\Helpers\System;
use App\Models\Company;
use App\Models\Modules\Faturamento as Model;
use App\Services\Module;

class Faturamento implements FromCollection
{
	use Exportable;

	private $writerType		= Excel::XLSX;
	private $headers		= [
		'Content-Type' => 'text/csv',
	];
	
	private $collection		= null;
	private $sheetHeaders	= [
		['id_faturamento' => 'LINHA 3 É CABEÇALHO DO ARQUIVO - NÃO REMOVER', 'doc_entry' => '','cancelada' => '','doc_type' => '','address_name' => '','doc_date' => '','doc_due_date' => '','tax_date' => '','card_code' => '','sequence_code' => '','comments' => '','bpl_id_assigned_to_invoice' => '','jrnl_memo' => '','sequence_serial' => '','series_str' => '','sequence_model' => '','chave_acesso' => '','chave_verificacao' => '','chave_autenticacao' => '','line_num' => '','item_code' => '','item_description' => '','whs_code' => '','usage' => '','quantity' => '','unit_price' => '','acct_code' => '','id_docext' => '','tax_code' => '','f100_pis' => '','f100_op' => '','f100_tr' => ''],
		['id_faturamento' => 'CABEÇALHO','doc_entry' => '','cancelada' => '','doc_type' => '','address_name' => '','doc_date' => '','doc_due_date' => '','tax_date' => '','card_code' => '','sequence_code' => '','comments' => '','bpl_id_assigned_to_invoice' => '','jrnl_memo' => '','sequence_serial' => '','series_str' => '','sequence_model' => '','chave_acesso' => '','chave_verificacao' => '','chave_autenticacao' => '','line_num' => '','item_code' => '','item_description' => '','whs_code' => '','usage' => '','quantity' => '','unit_price' => '','acct_code' => '','id_docext' => '','tax_code' => '','f100_pis' => '','f100_op' => '','f100_tr' => ''],
		['id_faturamento' => 'ID','doc_entry' => 'DocEntry','cancelada' => 'CANCELAD','doc_type' => 'DocType','address_name' => 'AddressName','doc_date' => 'DocDate','doc_due_date' => 'DocDueDate','tax_date' => 'TaxDate','card_code' => 'CardCode','sequence_code' => 'SequenceCode','comments' => 'Comments','bpl_id_assigned_to_invoice' => 'BPL_IDAssignedToInvoice','jrnl_memo' => 'JrnlMemo','sequence_serial' => 'SequenceSerial','series_str' => 'SeriesSTR','sequence_model' => 'SequenceModel','chave_acesso' => 'ChaveAcesso','chave_verificacao' => 'ChaveVerificacao','chave_autenticacao' => 'ChaveAutenticacao','line_num' => 'LineNum','item_code' => 'ItemCode','item_description' => 'ItemDescription','whs_code' => 'WhsCode','usage' => 'Usage','quantity' => 'Quantity','unit_price' => 'UnitPrice','acct_code' => 'AcctCode','id_docext' => 'ID_DOCEXT','tax_code' => 'TaxCode','f100_pis' => 'F100PIS','f100_op' => 'F100OP','f100_tr' => 'F100TR'],
		['id_faturamento' => 'ID','doc_entry' => 'DocEntry','cancelada' => 'Cancelada?','doc_type' => 'Tipo Documento','address_name' => 'Nome Endereço','doc_date' => 'Data Documento','doc_due_date' => 'Data Vencimento','tax_date' => 'Data Emissão','card_code' => 'Código Cliente','sequence_code' => 'Sequencia Numeração SAP','comments' => 'Comentários','bpl_id_assigned_to_invoice' => 'ID Filial ou CPNJ Faturamento','jrnl_memo' => 'Observações Contabilidade','sequence_serial' => 'Número Nota','series_str' => 'Série Nota','sequence_model' => 'Modelo Nota','chave_acesso' => 'Chave de Acesso NFe','chave_verificacao' => 'Chave Verificação NFSe','chave_autenticacao' => 'Chave Autenticação Modelo 21 e 22','line_num' => 'Número Linha Item','item_code' => 'Código Item SAP','item_description' => 'Descrição Item','whs_code' => 'Código Depósito','usage' => 'Utilização','quantity' => 'Quantidade','unit_price' => 'Valor Unitário','acct_code' => 'Conta Contábil','id_docext' => 'ID Fatura Sistema','tax_code' => 'Código Imposto','f100_pis' => 'Registro F100','f100_op' => 'Operação F100','f100_tr' => 'Tipo Venda F100'],
	];

	public function __construct (Collection $collection)
	{
		$this->collection = $collection->map(function ($item) {
			
			if (!empty($item['doc_date']))
				$item['doc_date'] = date('Ymd', strtotime(@$item['doc_date']));

			if (!empty($item['doc_due_date']))
				$item['doc_due_date'] = date('Ymd', strtotime(@$item['doc_due_date']));

			if (!empty($item['tax_date']))
				$item['tax_date'] = date('Ymd', strtotime(@$item['tax_date']));
			
			return [
				@$item['id_faturamento'],
				'',
				@$item['cancelada'],
				'dDocument_Items',
				@$item['address_name'],
				@$item['doc_date'],
				@$item['doc_due_date'],
				@$item['tax_date'],
				@$item['card_code'],
				'-2',
				@$item['comments'],
				@$item['bpl_id_assigned_to_invoice'],
				@$item['jrnl_memo'],
				@$item['sequence_serial'],
				@$item['series_str'],
				@$item['sequence_model'],
				@$item['chave_acesso'],
				@$item['chave_verificacao'],
				@$item['chave_autenticacao'],
				@$item['line_num'],
				@$item['item_code'],
				@$item['item_description'],
				@$item['whs_code'],
				'22',
				@$item['quantity'],
				@$item['unit_price'],
				@$item['acct_code'],
				@$item['id_docext'],
				@$item['tax_code'],
				@$item['f100_pis'],
				@$item['f100_op'],
				@$item['f100_tr'],
			];
		});
	}

	public function collection ()
	{
		return (new Collection($this->sheetHeaders))->concat($this->collection);
	}
}