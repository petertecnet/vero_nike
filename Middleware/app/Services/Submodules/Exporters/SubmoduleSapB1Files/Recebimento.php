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
		['id_item' => 'LINHA 3 É CABEÇALHO DO ARQUIVO, POR FAVOR NÃO REMOVER A LINHA.', 'DocEntry' => '', 'cnpj' => '', 'data_pagamento' => '', 'codigo_cliente' => '', 'codigo_externo_pagamento' => '', 'conta_contabil' => '', 'carteira' => '', 'banco' => '', 'agencia' => '', 'conta' => '', 'pagamento_total' => '', 'comentarios' => '', 'obs_diario' => '', 'tipo_documento' => '', 'numero_linha' => '', 'modelo' => '', 'numero_nf' => '', 'serie_nf' => '', 'id_fatura_sistema' => '', 'valor_documento' => '', 'valor_desconto' => '', 'valor_juros_multa' => '', 'valor_recebido' => ''],
		['id_item' => 'CABEÇALHO', 'DocEntry' => '', 'cnpj' => '', 'data_pagamento' => '', 'codigo_cliente' => '', 'codigo_externo_pagamento' => '', 'conta_contabil' => '', 'carteira' => '', 'banco' => '', 'agencia' => '', 'conta' => '', 'pagamento_total' => '', 'comentarios' => '', 'obs_diario' => '', 'tipo_documento' => 'LINHAS', 'numero_linha' => '', 'modelo' => '', 'numero_nf' => '', 'serie_nf' => '', 'id_fatura_sistema' => '', 'valor_documento' => '', 'valor_desconto' => '', 'valor_juros_multa' => '', 'valor_recebido' => ''],
		['id_item' => 'ID', 'DocEntry' => 'DocEntry', 'cnpj' => 'BPL_IDAssignedToInvoice', 'data_pagamento' => 'DocDate', 'codigo_cliente' => 'CardCode', 'codigo_externo_pagamento' => 'ID_DOCEXT', 'conta_contabil' => 'AcctCode', 'carteira' => 'U_G2_CARTEIRA', 'banco' => 'U_G2_BANCO', 'agencia' => 'U_G2_AG', 'conta' => 'U_G2_CONTA', 'pagamento_total' => 'TransferSum', 'comentarios' => 'Comments', 'obs_diario' => 'JrnlMemo', 'tipo_documento' => 'DocType', 'numero_linha' => 'LineNum', 'modelo' => 'SequenceModel', 'numero_nf' => 'SequenceSerial', 'serie_nf' => 'SeriesSTR', 'id_fatura_sistema' => 'ID_DOCEXT', 'valor_documento' => 'DocTotal', 'valor_desconto' => 'Desconto', 'valor_juros_multa' => 'JurosMulta', 'valor_recebido' => 'VLrRecebido'],
		['id_item' => 'ID', 'DocEntry' => 'DocEntry', 'cnpj' => 'ID ou CNPJ do Faturamento', 'data_pagamento' => 'Data de Pagamento', 'codigo_cliente' => 'Código Cliente', 'codigo_externo_pagamento' => 'Código Externo Pagamento', 'conta_contabil' => 'Conta Contábil', 'carteira' => 'Carteira', 'banco' => 'Banco', 'agencia' => 'Agencia', 'conta' => 'Conta', 'pagamento_total' => 'Pagamento Total', 'comentarios' => 'Comentários', 'obs_diario' => 'Obs. Diário', 'tipo_documento' => 'Tipo Documento', 'numero_linha' => 'Número Linha', 'modelo' => 'Modelo', 'numero_nf' => 'Número NF', 'serie_nf' => 'Série NF', 'id_fatura_sistema' => 'ID Fatura Sistema', 'valor_documento' => 'Valor Documento', 'valor_desconto' => 'Valor Desconto', 'valor_juros_multa' => 'Valor Juros/Multa', 'valor_recebido' => 'Valor Recebido'],
	];

	public function __construct (Collection $collection)
	{
		$this->collection = $collection->map(function ($item) {
			
			if (!empty($item['data_pagamento']))
				$item['data_pagamento'] = date('Ymd', strtotime(@$item['data_pagamento']));

			return [
				@$item['id_item'],
				'',
				@$item['cnpj'],
				@$item['data_pagamento'],
				@$item['codigo_cliente'],
				@$item['codigo_externo_pagamento'],
				@$item['conta_contabil'],
				@$item['carteira'],
				@$item['banco'],
				@$item['agencia'],
				@$item['conta'],
				@$item['pagamento_total'],
				@$item['comentarios'],
				@$item['obs_diario'],
				'NFS',
				@$item['numero_linha'],
				@$item['modelo'],
				@$item['numero_nf'],
				@$item['serie_nf'],
				@$item['id_fatura_sistema'],
				@$item['valor_documento'],
				@$item['valor_desconto'],
				@$item['valor_juros_multa'],
				@$item['valor_recebido'],
			];
		});
	}

	public function collection ()
	{
		return (new Collection($this->sheetHeaders))->concat($this->collection);
	}
}