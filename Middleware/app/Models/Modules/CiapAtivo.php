<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

use App\Models\Company;

class CiapAtivo extends Model
{
	protected $table = 'module_ciap_ativos';

	//MODULO FTURAMENTO//
	protected $fillable = ['codigo_ativo_sap','status','data_aquisicao','numero_parcelas','tipo_bem','item_principal','codigo_conta','código_centro_custo','função_bem','vida_util','código_item_sap','sequencial'];

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
