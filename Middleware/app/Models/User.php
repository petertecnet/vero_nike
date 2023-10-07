<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

use App\Models\{Profile};

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $fillable = ['login','name','email','profile_id','password', 'avatar'];
	protected $hidden = ['password', 'remember_token'];
	protected $with = ['profile'];
	protected $attributes = [
		'config'			=> '{"company":null}',
	];
	protected $casts = [
		'config'			=> 'object',
		'email_verified_at' => 'datetime',
	];

	public function RestrictSelectedCompany (?array $companies) : User
	{
		if (is_null($companies))
			$companies = [];

		if (!in_array($this->config->company, $companies))
			return $this->SetCompany(null);

		return $this;
	}

	public function setCompany (?int $id) : User
	{
		$config = (object) $this->config;

		if (is_null($config))
			$config = new stdClass();

		$config->company = $id;

		$this->config = $config;

		return $this;
	}

	public function MyCompany () : ?Company
	{
		if (!$this->HasSelectedCompany())
			return null;

		return Company::find($this->config->company);
	}

	public function HasSelectedCompany () : bool
	{
		return !is_null($this->config) && isset($this->config->company) && !is_null($this->config->company);
	}

	public function HasPermission (string $permission)
	{
		return in_array($permission, (array) @$this->profile->permissions);
	}

	/**
	 * Mutators
	 */

	public function setPasswordAttribute ($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function getProfileNameAttribute ()
	{
		if (is_null($this->profile))
			return '<i>Sem perfil</i>';

		return $this->profile->name;
	}

	public function getUltimaAtualizacaoAttribute ()
	{
		return date('d/m/Y', strtotime( $this->updated_at));
	}

	/**
	 * Relationship
	 */

	public function Profile ()
	{
		return $this->belongsTo(Profile::class);
	}

	public function Companies ()
	{
		return $this->belongsToMany(Company::class, 'users_companies');
	}
}
