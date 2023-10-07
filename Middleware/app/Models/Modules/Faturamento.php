<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

use App\Models\Company;

class Faturamento extends Model
{
	protected $table = 'module_faturamento';

	//MODULO FTURAMENTO//
	protected $fillable = ['id_faturamento','cancelada','address_name','doc_date','doc_due_date','tax_date','card_code','sequence_code','comments','bpl_id_assigned_to_invoice','jrnl_memo','sequence_serial','series_str','sequence_model','chave_acesso','chave_verificacao','chave_autenticacao','line_num','item_code','item_description','whs_code','usage','quantity','unit_price','acct_code','id_docext','tax_code','f100_pis','f100_op','f100_tr'];

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
