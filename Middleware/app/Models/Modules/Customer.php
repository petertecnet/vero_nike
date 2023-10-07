<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

use App\Models\Company;

class Customer extends Model
{
	protected $table = 'module_cliente';

	//AJUTES MODULO CLIENTE//
	protected $fillable = ['document','codigo_cliente','nome_cliente','nome_fantasia','tipo_cadastro','ddd','telefone','email','grupo_clientes','cnpj','inscricao_estadual','inscricao_municipal','cpf','tipo_endereco_a','nome_endereco_a','tipo_logradouro_a','endereco_a','numero_a','bairro_a','cep_a','complemento_a','cidade_a','estado_a','pais_a','indicador_inscricao_estadual','tipo_endereco_b','nome_endereco_b','tipo_logradouro_b','endereco_b','numero_b','bairro_b','complemento_b','cidade_b','estado_b','pais_b','tipo_assinante','tipo_cliente'];

	/** 
	 * Query Scope
	 */

	public function scopeOnlyNotExported ($query)
	{
		return $query->where('exported', 0);
	}

	public function scopeFromCompany ($query, Company $company)
	{
		return $query->where('company_id', $company->id);
	}
}
