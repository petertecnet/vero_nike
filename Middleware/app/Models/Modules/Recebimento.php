<?php 

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;


class Recebimento extends Model
{
	protected $table = 'module_recebimento';
	protected $fillable = [
		'U_G2_CARTEIRA',
		'U_G2_BANCO',
		'U_G2_AG',
		'U_G2_CONTA',
		'U_G2_CCONTABIL'
    ];

	public function scopeOnlyNotExported ($query)
	{
		return $query->where('exported', 0);
	}

    public function scopeFromCompany ($query, Company $company)
	{
		return $query->where('company_id', $company->id);
	}

}
