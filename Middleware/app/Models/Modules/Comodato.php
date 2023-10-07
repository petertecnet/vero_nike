<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;


class Comodato extends Model
{
	public $timestamps = false;
	protected $table = 'module_comodato';

	protected $fillable = ['quantidade','valor_unitario','codigo_imposto'];

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