<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

use App\Models\Company;

class Estoque extends Model
{
	protected $table = 'module_estoque';

	// MODULO ESTOQUE//
	protected $fillable = ['address_mame','doc_date','doc_due_date','tax_date','card_code','sequence_code','comments','bpl_id_assigned_to_invoice','jrnl_memo','sequence_serial','series_str','sequence_model','chave_acesso','num_os','Nota fiscal','num_cont','LineNum','item_code','item_description','mac_serie','whs_code','usage','quantity','unit_price','tax_code'];

	/** 
	 * Query Scope
	 */
	public function scopeFromCompany ($query, Company $company)
	{
		return $query->where('company_id', $company->id);
	}
}

