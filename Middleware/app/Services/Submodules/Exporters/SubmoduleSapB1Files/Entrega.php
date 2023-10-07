<?php

namespace App\Services\Submodules\Exporters\SubmoduleSapB1Files;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;

class Entrega implements FromCollection
{
	use Exportable;

	private $writerType		= Excel::XLSX;
	private $headers		= [
		'Content-Type' => 'text/csv',
	];
	
	private $collection		= null;
	private $sheetHeaders	= [
		// ['codigo_ativo_sap' => 'Código do Ativo SAP', 'status' => 'Status', 'data_aquisicao' => 'Data de Aquisição', 'numero_parcelas' => 'Número de Parcelas', 'tipo_bem' => 'Tipo do Bem', 'item_principal' => 'Item Principal', 'codigo_conta' => 'Código da Conta', 'código_centro_custo' => 'Código do Centro de Custo', 'função_bem' => 'Função do Bem', 'vida_util' => 'Vida útil', 'código_item_sap' => 'Código do Item SAP', 'sequencial' => 'Sequencial'],
	];

	public function __construct (Collection $collection)
	{
		$this->collection = $collection->map(function ($item) {
			
			// if (!empty($item['data_aquisicao']))
			// 	$item['data_aquisicao'] = date('d/m/Y', strtotime(@$item['data_aquisicao']));

			return [
				// @$item['codigo_ativo_sap'],
				// @$item['status'],
				// @$item['data_aquisicao'],
				// @$item['numero_parcelas'],
				// @$item['tipo_bem'],
				// @$item['item_principal'],
				// @$item['codigo_conta'],
				// @$item['código_centro_custo'],
				// @$item['função_bem'],
				// @$item['vida_util'],
				// @$item['código_item_sap'],
				// @$item['sequencial'],
			];
		});
	}

	public function collection ()
	{
		return (new Collection($this->sheetHeaders))->concat($this->collection);
	}
}