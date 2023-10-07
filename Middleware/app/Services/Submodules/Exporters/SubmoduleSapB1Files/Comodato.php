<?php

namespace App\Services\Submodules\Exporters\SubmoduleSapB1Files;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;

class Comodato implements FromCollection
{
	use Exportable;

	private $writerType		= Excel::XLSX;
	private $headers		= [
		'Content-Type' => 'text/csv',
	];
	private $collection		= null;
	private $sheetHeaders	= [
		['id_item' => 'LINHA 3 É CABEÇALHO DO ARQUIVO - NÃO REMOVER', 'doc_entry' => '', 'tipo_documento' => '', 'nome_endereco' => '', 'data_documento' => '', 'data_vencimento' => '', 'data_emissao' => '', 'codigo_cliente' => '', 'sequencia_numeracao_sap' => '', 'comentarios' => '', 'cnpj' => '', 'observacoes_contabilidade' => '', 'numero_nota' => '', 'serie_nota' => '', 'modelo_nota' => '', 'chave_acesso_nfe' => '', 'numero_os' => '', 'numero_contrato' => '', 'numero_linha_item' => '', 'codigo_item_sap' => '', 'descricao_item' => '', 'numero_mac' => '', 'codigo_deposito' => '', 'utilizacao' => '', 'quantidade' => '', 'valor_unitario' => '', 'codigo_imposto' => ''],
		['id_item' => 'CABEÇALHO', 'doc_entry' => '', 'tipo_documento' => '', 'nome_endereco' => '', 'data_documento' => '', 'data_vencimento' => '', 'data_emissao' => '', 'codigo_cliente' => '', 'sequencia_numeracao_sap' => '', 'comentarios' => '', 'cnpj' => '', 'observacoes_contabilidade' => '', 'numero_nota' => '', 'serie_nota' => '', 'modelo_nota' => '', 'chave_acesso_nfe' => '', 'numero_os' => '', 'numero_contrato' => '', 'numero_linha_item' => 'LINHAS', 'codigo_item_sap' => '', 'descricao_item' => '', 'numero_mac' => '', 'codigo_deposito' => '', 'utilizacao' => '', 'quantidade' => '', 'valor_unitario' => '', 'codigo_imposto' => ''],
		['id_item' => 'ID', 'doc_entry' => 'DocEntry', 'tipo_documento' => 'DocType', 'nome_endereco' => 'AddressName', 'data_documento' => 'DocDate', 'data_vencimento' => 'DocDueDate', 'data_emissao' => 'TaxDate', 'codigo_cliente' => 'CardCode', 'sequencia_numeracao_sap' => 'SequenceCode', 'comentarios' => 'Comments', 'cnpj' => 'BPL_IDAssignedToInvoice', 'observacoes_contabilidade' => 'JrnlMemo', 'numero_nota' => 'SequenceSerial', 'serie_nota' => 'SeriesSTR', 'modelo_nota' => 'SequenceModel', 'chave_acesso_nfe' => 'ChaveAcesso', 'numero_os' => 'NUM_OS', 'numero_contrato' => 'NUM_CONT', 'numero_linha_item' => 'LineNum', 'codigo_item_sap' => 'ItemCode', 'descricao_item' => 'ItemDescription', 'numero_mac' => 'MAC_SERIE', 'codigo_deposito' => 'WhsCode', 'utilizacao' => 'Usage', 'quantidade' => 'Quantity', 'valor_unitario' => 'UnitPrice', 'codigo_imposto' => 'TaxCode'],
		['id_item' => 'ID', 'doc_entry' => 'DocEntry', 'tipo_documento' => 'Tipo Documento', 'nome_endereco' => 'Nome Endereço', 'data_documento' => 'Data Documento', 'data_vencimento' => 'Data Vencimento', 'data_emissao' => 'Data Emissão', 'codigo_cliente' => 'Código Cliente', 'sequencia_numeracao_sap' => 'Sequencia Numeração SAP', 'comentarios' => 'Comentários', 'cnpj' => 'ID Filial ou CPNJ Faturamento', 'observacoes_contabilidade' => 'Observações Contabilidade', 'numero_nota' => 'Número Nota', 'serie_nota' => 'Série Nota', 'modelo_nota' => 'Modelo Nota', 'chave_acesso_nfe' => 'Chave de Acesso NFe', 'numero_os' => 'Número OS', 'numero_contrato' => 'Número Contrato', 'numero_linha_item' => 'Número Linha Item', 'codigo_item_sap' => 'Código Item SAP', 'descricao_item' => 'Descrição Item', 'numero_mac' => 'Número MAC/Série', 'codigo_deposito' => 'Código Depósito', 'utilizacao' => 'Utilização', 'quantidade' => 'Quantidade', 'valor_unitario' => 'Valor Unitário', 'codigo_imposto' => 'Código Imposto'],
	];

	public function __construct (Collection $collection)
	{
		$this->collection = $collection->map(function ($item) {
			return [
				@$item['id_item'],
				'',
				'dDocument_Items',
				@$item['nome_endereco'],
				@$item['data_documento'],
				@$item['data_vencimento'],
				@$item['data_emissao'],
				@$item['codigo_cliente'],
				'-2',
				@$item['comentarios'],
				@$item['cnpj'],
				@$item['observacoes_contabilidade'],
				@$item['numero_nota'],
				@$item['serie_nota'],
				'39',
				@$item['chave_acesso_nfe'],
				@$item['numero_os'],
				@$item['numero_contrato'],
				@$item['numero_linha_item'],
				@$item['codigo_item_sap'],
				@$item['descricao_item'],
				@$item['numero_mac'],
				@$item['codigo_deposito'],
				@$item['utilizacao'],
				@$item['quantidade'],
				@$item['valor_unitario'],
				@$item['codigo_imposto'],
			 ];
		});
	}

	public function collection ()
	{
		return (new Collection($this->sheetHeaders))->concat($this->collection);
	}
}
