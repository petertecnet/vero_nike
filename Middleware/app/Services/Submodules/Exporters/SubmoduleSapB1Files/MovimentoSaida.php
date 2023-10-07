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

class MovimentoSaida implements FromCollection
{
	use Exportable;

	private $writerType		= Excel::XLSX;
	private $headers		= [
		'Content-Type' => 'text/csv',
	];
	
	private $collection		= null;
	private $sheetHeaders	= [
		['id_movimento' => 'LINHA 3 É CABEÇALHO DO ARQUIVO - NÃO REMOVER', 'doc_entry' => '', 'data_documento' => '', 'codigo_cliente' => '', 'comentarios' => '', 'cnpj' => '', 'observacoes_contabilidade' => '', 'numero_os' => '', 'numero_contrato' => '', 'numero_linha_item' => '', 'codigo_item_sap' => '', 'descricao_item' => '', 'codigo_deposito' => '', 'quantidade' => '', 'valor_unitário' => ''],
		['id_movimento' => 'CABEÇALHO', 'doc_entry' => '', 'data_documento' => '', 'codigo_cliente' => '', 'comentarios' => '', 'cnpj' => '', 'observacoes_contabilidade' => '', 'numero_os' => '', 'numero_contrato' => '', 'numero_linha_item' => 'LINHAS', 'codigo_item_sap' => '', 'descricao_item' => '', 'codigo_deposito' => '', 'quantidade' => '', 'valor_unitário' => ''],
		['id_movimento' => 'ID', 'doc_entry' => 'DocEntry', 'data_documento' => 'DocDate', 'codigo_cliente' => 'CardCode', 'comentarios' => 'Comments', 'cnpj' => 'BPL_IDAssignedToInvoice', 'observacoes_contabilidade' => 'JrnlMemo', 'numero_os' => 'NUM_OS', 'numero_contrato' => 'NUM_CONT', 'numero_linha_item' => 'LineNum', 'codigo_item_sap' => 'ItemCode', 'descricao_item' => 'ItemDescription', 'codigo_deposito' => 'WhsCode', 'quantidade' => 'Quantity', 'valor_unitário' => 'UnitPrice'],
		['id_movimento' => 'ID', 'doc_entry' => 'DocEntry', 'data_documento' => 'Data Documento', 'codigo_cliente' => 'Código Cliente', 'comentarios' => 'Comentários', 'cnpj' => 'ID Filial ou CPNJ Faturamento', 'observacoes_contabilidade' => 'Observações Contabilidade', 'numero_os' => 'Número OS', 'numero_contrato' => 'Número Contrato', 'numero_linha_item' => 'Número Linha Item', 'codigo_item_sap' => 'Código Item SAP', 'descricao_item' => 'Descrição Item', 'codigo_deposito' => 'Código Depósito', 'quantidade' => 'Quantidade', 'valor_unitário' => 'Valor Unitário'],
	];

	public function __construct (Collection $collection)
	{
		$this->collection = $collection->map(function ($item) {
			
			if (!empty($item['data_documento']))
				$item['data_documento'] = date('Ymd', strtotime(@$item['data_documento']));
			
			return [
				@$item['id_movimento'],
				@$item['doc_entry'],
				@$item['data_documento'],
				@$item['codigo_cliente'],
				@$item['comentarios'],
				@$item['cnpj'],
				@$item['observacoes_contabilidade'],
				@$item['numero_os'],
				@$item['numero_contrato'],
				@$item['numero_linha_item'],
				@$item['codigo_item_sap'],
				@$item['descricao_item'],
				@$item['numero_mac_serie'],
				@$item['codigo_deposito'],
				@$item['quantidade'],
				@$item['valor_unitário'],
			];
		});
	}

	public function collection ()
	{
		return (new Collection($this->sheetHeaders))->concat($this->collection);
	}
}