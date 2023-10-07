<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

use App\Models\Company;

class CiapDocumento extends Model
{
	protected $table = 'module_ciap_documentos';

	//MODULO FTURAMENTO//
	protected $fillable = ['codigo_ativo_sap','data_documento','codigo_participante','chave_acesso','numero_nf','serie','modelo','linha','item_nf','quantidade','unidade_medida','icms_operação_propria','icms_st','icms_frete','icms_diferencial_aliquota','tipo_documento','doc_cntry'];

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
