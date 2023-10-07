<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Model;

use Exception;
use App\Models\Company;
use App\Models\User;
use App\Services\Module;

class Import extends Model
{
	protected $table = 'log_import';
	public $timestamps = false;

	protected $fillable = ['user_id'];

	public function Purge (Module $module)
	{
		$this->ClearAllEntries($module);

		$this->purged = true;
		$this->save();
	}

	private function ClearAllEntries (Module $module)
	{
		if (!$this->exists)
			throw new Exception('Invalid call, Clear Entries of a non saved log');

		$query = $module->GetModelQuery();

		$query
			->where('log_import_id', $this->id)
			->delete()
		;
		
		$this->purged = true;
	}

	/**
	 * Mutators
	 */

	public function getDateStringAttribute ()
	{
		return date('d/m/Y H:i:s', strtotime($this->date));
	}

	/**
	 * Custom Scope
	 */

	public function scopeLatestFirst ($query)
	{
		return $query->orderBy('date', 'DESC');
	}

	public function scopeFromCompany ($query, Company $company)
	{
		return $query->where('company_id', $company->id);
	}

	public function scopeFromModule ($query, Module $module)
	{
		return $query->where('module', $module->key);
	}

	public function scopeOnlyUnpurged ($query)
	{
		return $query->where('purged', false);
	}

	/**
	 * Relationship
	 */

	public function Company ()
	{
		return $this->BelongsTo(Company::class);
	}

	public function User ()
	{
		return $this->BelongsTo(User::class);
	}
}