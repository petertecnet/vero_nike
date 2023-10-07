<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Company};

class Customer extends Model
{
	use HasFactory;

	protected $table = "customers";
	protected $fillable = ['id', 'name','company_id'];
	protected $with = ['company'];


    public function companyCustomer()
{
    return $this->belongsTo(Company::class);
}
public function Company ()
	{
		return $this->belongsTo(Company::class);
	}
public function getCompanyNameAttribute ()
	{
		if (is_null($this->company))
			return '<i>Sem empresa</i>';

		return $this->company->name;
	}
}
