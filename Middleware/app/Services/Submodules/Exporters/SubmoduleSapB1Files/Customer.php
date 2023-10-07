<?php

namespace App\Services\Submodules\Exporters\SubmoduleSapB1Files;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;

class Customer implements FromCollection
{
	use Exportable;

	private $writerType		= Excel::XLSX;
	private $headers		= [
		'Content-Type' => 'text/csv',
	];
	private $collection		= null;
	private $sheetHeaders	= [
		['codigo_cliente' => 'LINHA 2 É CABEÇALHO DO ARQUIVO - NÃO REMOVER','nome_cliente' => '','nome_fantasia' => '','tipo_cadastro' => '','ddd' => '','telefone' => '','email' => '','grupo_clientes' => '','cnpj' => '','inscricao_estadual' => '','inscricao_municipal' => '','cpf' => '','tipo_endereco_a' => '','nome_endereco_a' => '','tipo_logradouro_a' => '','endereco_a' => '','numero_a' => '','bairro_a' => '','cep_a' => '','complemento_a' => '','cidade_a' => '','estado_a' => '','pais_a' => '', 'cidade_a_2' => '', 'indicador_inscricao_estadual' => '', 'indicador_inscricao_estadual_2' => '', 'tipo_endereco_b' => '','nome_endereco_b' => '','tipo_logradouro_b' => '','endereco_b' => '','numero_b' => '','bairro_b' => '','cep_b' => '','complemento_b' => '','cidade_b' => '', 'cidade_b_2' => 'CityB', 'estado_b' => '','pais_b' => '','tipo_assinante' => '','tipo_cliente' => ''],
		['codigo_cliente' => 'CardCode','nome_cliente' => 'CardName','nome_fantasia' => 'CardFName','tipo_cadastro' => 'CardType','ddd' => 'Phone2','telefone' => 'Phone1','email' => 'E_Mail','grupo_clientes' => 'GroupCode','cnpj' => 'TaxId0','inscricao_estadual' => 'TaxId1','inscricao_municipal' => 'TaxId3','cpf' => 'TaxId4','tipo_endereco_a' => 'AdresType','nome_endereco_a' => 'AddressName','tipo_logradouro_a' => 'AddrType','endereco_a' => 'Street','numero_a' => 'StreetNo','bairro_a' => 'Block','cep_a' => 'ZipCode','complemento_a' => 'Building','cidade_a' => 'County','estado_a' => 'State','pais_a' => 'Country','cidade_a_2' => 'City','indicador_inscricao_estadual' => 'U_SKILL_indIEDest','indicador_inscricao_estadual_2' => 'U_SKILL_IE','tipo_endereco_b' => 'AdresTypeB','nome_endereco_b' => 'AddressB','tipo_logradouro_b' => 'AddrTypeB','endereco_b' => 'StreetB','numero_b' => 'StreetNoB','bairro_b' => 'BlockB','cep_b' => 'ZipCodeB','complemento_b' => 'BuildingB','cidade_b' => 'CountryB','cidade_b_2' => 'CityB','estado_b' => 'StateB','pais_b' => 'CountyB','tipo_assinante' => 'U_TpAssinante','tipo_cliente' => 'U_TpCli_ComEnerg'],
		['codigo_cliente' => 'Código Cliente','nome_cliente' => 'Nome Cliente','nome_fantasia' => 'Nome Estrangeiro/Fantasia','tipo_cadastro' => 'Tipo de Cadastro','ddd' => 'DDD','telefone' => 'Telefone','email' => 'E-mail','grupo_clientes' => 'Código Grupo de Clientes','cnpj' => 'CNPJ','inscricao_estadual' => 'Inscrição Estadual','inscricao_municipal' => 'Inscrição Municipal','cpf' => 'CPF','tipo_endereco_a' => 'Tipo Endereço','nome_endereco_a' => 'Nome Endereço','tipo_logradouro_a' => 'Tipo de Logradouro','endereco_a' => 'Endereço','numero_a' => 'Número','bairro_a' => 'Bairro','cep_a' => 'CEP','complemento_a' => 'Complemento','cidade_a' => 'País','estado_a' => 'Estado','pais_a' => 'Cidade','cidade_a_2' => 'Cidade','indicador_inscricao_estadual' => 'Indicador Inscrição Estadual','indicador_inscricao_estadual_2' => 'Incrição Estadual','tipo_endereco_b' => 'Tipo Endereço','nome_endereco_b' => 'Nome Endereço','tipo_logradouro_b' => 'Tipo de Logradouro','endereco_b' => 'Endereço','numero_b' => 'Número','bairro_b' => 'Bairro','cep_b' => 'CEP','complemento_b' => 'Complemento','cidade_b' => 'Cidade','cidade_b_2' => 'Cidade','estado_b' => 'Estado','pais_b' => 'País','tipo_assinante' => 'Tipo de Assinante','tipo_cliente' => 'Tipo Cliente Com./Energia'],
	];

	public function __construct (Collection $collection)
	{
		$this->collection = $collection->map(function ($item) {
			return [
				@$item['codigo_cliente'],
				@$item['nome_cliente'],
				@$item['nome_fantasia'],
				@$item['tipo_cadastro'],
				@$item['ddd'],
				@$item['telefone'],
				@$item['email'],
				@$item['grupo_clientes'],
				@$item['cnpj'],
				@$item['inscricao_estadual'],
				@$item['inscricao_municipal'],
				@$item['cpf'],
				@$item['tipo_endereco_a'],
				@$item['nome_endereco_a'],
				@$item['tipo_logradouro_a'],
				@$item['endereco_a'],
				@$item['numero_a'],
				@$item['bairro_a'],
				@$item['cep_a'],
				@$item['complemento_a'],
				@$item['cidade_a'],
				@$item['estado_a'],
				@$item['pais_a'],
				@$item['cidade_a'],
				@$item['indicador_inscricao_estadual'],
				@$item['indicador_inscricao_estadual_2'],
				@$item['tipo_endereco_b'],
				@$item['nome_endereco_b'],
				@$item['tipo_logradouro_b'],
				@$item['endereco_b'],
				@$item['numero_b'],
				@$item['bairro_b'],
				@$item['cep_b'],
				@$item['complemento_b'],
				@$item['cidade_b'],
				@$item['cidade_b'],
				@$item['estado_b'],
				@$item['pais_b'],
				@$item['tipo_assinante'],
				@$item['tipo_cliente'],
			 ];
		});
	}

	public function collection ()
	{
		return (new Collection($this->sheetHeaders))->concat($this->collection);
	}
}
