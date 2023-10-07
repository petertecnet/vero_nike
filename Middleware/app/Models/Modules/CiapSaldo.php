<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

use App\Models\Company;

class CiapSaldo extends Model
{
	protected $table = 'module_ciap_saldos';

	//MODULO FTURAMENTO//
	protected $fillable = ['codigo_ativo_sap','parcela','data_credito','saldo_icms','total_saidas','saídas_tributadas_exportacao','indice_apropriacao','valor_parcela','valor_apropriado_parcela'];

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
