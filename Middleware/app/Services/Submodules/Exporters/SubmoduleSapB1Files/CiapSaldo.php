<?php

namespace App\Services\Submodules\Exporters\SubmoduleSapB1Files;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;

class CiapSaldo implements FromCollection
{
	use Exportable;

	private $writerType		= Excel::XLSX;
	private $headers		= [
		'Content-Type' => 'text/csv',
	];
	
	private $collection		= null;
	private $sheetHeaders	= [
		['codigo_ativo_sap' => 'Código do Ativo SAP', 'parcela' => 'Parcela', 'data_credito' => 'Data do Crédito', 'saldo_icms' => 'SaldoICMS', 'total_saidas' => 'Total de Saídas', 'saídas_tributadas_exportacao' => 'Saídas Tributadas e Exportação', 'indice_apropriacao' => 'Indice de Apropriação', 'valor_parcela' => 'Valor da Parcela', 'valor_apropriado_parcela' => 'Valor Apropriado da Parcela'],
	];

	public function __construct (Collection $collection)
	{
		$this->collection = $collection->map(function ($item) {
			
			if (!empty($item['data_documento']))
				$item['data_documento'] = date('d/m/Y', strtotime(@$item['data_documento']));

			return [
				@$item['codigo_ativo_sap'],
				@$item['parcela'],
				@$item['data_credito'],
				@$item['saldo_icms'],
				@$item['total_saidas'],
				@$item['saídas_tributadas_exportacao'],
				@$item['indice_apropriacao'],
				@$item['valor_parcela'],
				@$item['valor_apropriado_parcela'],
			];
		});
	}

	public function collection ()
	{
		return (new Collection($this->sheetHeaders))->concat($this->collection);
	}
}