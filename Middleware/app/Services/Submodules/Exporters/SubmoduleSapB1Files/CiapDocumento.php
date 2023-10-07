<?php

namespace App\Services\Submodules\Exporters\SubmoduleSapB1Files;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;

class CiapDocumento implements FromCollection
{
	use Exportable;

	private $writerType		= Excel::XLSX;
	private $headers		= [
		'Content-Type' => 'text/csv',
	];
	
	private $collection		= null;
	private $sheetHeaders	= [
		['codigo_ativo_sap' => 'Código do Ativo SAP', 'data_documento' => 'Data do Documento', 'codigo_participante' => 'Código do Participante', 'chave_acesso' => 'Chave de Acesso', 'numero_nf' => 'Número da NF', 'serie' => 'Série', 'modelo' => 'Modelo', 'linha' => 'Linha', 'item_nf' => 'Item NF', 'quantidade' => 'Quantidade', 'unidade_medida' => 'Unidade de Medida', 'icms_operação_propria' => 'ICMS Operação Própria', 'icms_st' => 'ICMS-ST', 'icms_frete' => 'ICMS Frete', 'icms_diferencial_aliquota' => 'ICMS Diferencial de Alíquota', 'tipo_documento' => 'Tipo Documento', 'doc_cntry' => 'DocEntry'],
	];

	public function __construct (Collection $collection)
	{
		$this->collection = $collection->map(function ($item) {
			
			if (!empty($item['data_documento']))
				$item['data_documento'] = date('d/m/Y', strtotime(@$item['data_documento']));

			return [
				@$item['codigo_ativo_sap'],
				@$item['data_documento'],
				@$item['codigo_participante'],
				@$item['chave_acesso'],
				@$item['numero_nf'],
				@$item['serie'],
				@$item['modelo'],
				@$item['linha'],
				@$item['item_nf'],
				@$item['quantidade'],
				@$item['unidade_medida'],
				@$item['icms_operação_propria'],
				@$item['icms_st'],
				@$item['icms_frete'],
				@$item['icms_diferencial_aliquota'],
				@$item['tipo_documento'],
				@$item['doc_cntry'],
			];
		});
	}

	public function collection ()
	{
		return (new Collection($this->sheetHeaders))->concat($this->collection);
	}
}