<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use stdClass;
use App\Helpers\System;
use App\Models\{User};

class Company extends Model
{
	use HasFactory, SoftDeletes;

	protected $table = "companies";
	protected $fillable = ['id', 'name', 'CNPJ', 'config', 'status', 'user_id'];

	protected $attributes = [
		'config'			=> '{}',
	];
	protected $casts = [
		'config'			=> 'object',
	];

	public function GetSubmoduleConnector (string $module)
	{
		$submodule = $this->GetSubmoduleConnectorKey($module);

		if (is_null($submodule))
			return null;

		return System::GetSubmoduleConnectorFromKey($submodule);
	}

	public function SaveConnectorConfig (string $module, ?object $newValue) : Company
	{
		$config = $this->config;

		if (is_null($config))
			$config = new stdClass();

		if (!isset($config->{$module}))
			$config->$module = new stdClass();

		if (!isset($config->{$module}->{'connector'}))
			$config->{$module}->{'connector'} = new stdClass();

		$config->{$module}->{'connector'} = $newValue;

		$this->config = $config;

		return $this;
	}

	public function SaveProcessorConfig (string $module, ?object $newValue, ?int $index = null) : Company
	{
		$config = $this->config;

		if (is_null($config))
			$config = new stdClass();

		if (!isset($config->{$module}))
			$config->$module = new stdClass();

		if (!isset($config->{$module}->{'processor'}))
			$config->{$module}->{'processor'} = [];

		if (is_null($index))
		{
			$config->{$module}->{'processor'}[] = $newValue;
		}
		else
		{
			$config->{$module}->{'processor'}[$index] = $newValue;
		}

		$this->config = $config;

		return $this;
	}

	public function DestroyProcessorConfig (string $module, ?object $newValue, string $keyEdit) : Company
	{
		$config = $this->config;

		if (is_null($config))
			$config = new stdClass();

		if (!isset($config->{$module}))
			$config->$module = new stdClass();

		if (!isset($config->{$module}->{'processor'}))
			$config->{$module}->{'processor'} = [];

		$arr = (array) $newValue;

		$config->{$module}->{'processor'} = $arr;

		$this->config = $config;

		return $this;
	}

	public function HasSubmoduleConnectorForModule (string $module) : bool
	{
		$submodule = $this->GetSubmoduleConnectorKey($module);

		return !is_null($submodule);
	}

	public function HasSubmoduleExporterForModule (string $module) : bool
	{
		$module = System::GetModuleFromKey($module);

		return !is_null($module->export);
	}

	private function GetSubmoduleConnectorKey (string $module)
	{
		$config = @$this->GetSubmoduleConnectorConfig($module);

		#não existe uma definição de chave de submódulo definida
		if (!isset($config->submodule) || empty($config->submodule))
			return null;

		return $config->submodule;
	}

	public function GetSubmoduleConnectorConfig (string $module)
	{
		$config = @$this->config->{$module};

		#o módulo nem sequer foi definido
		if (empty($config))
			return null;

		#não existe configuração de conector para este módulo
		if (!isset($config->connector) || is_null($config->connector))
			return null;

		return $config->connector;
	}

	public function GetSubmoduleExporter (string $module)
	{
		$config = $this->GetSubmoduleExporterConfig($module);
		return System::GetSubmoduleExporterFromKey($config->submodule);
	}

	public function GetSubmoduleExporterConfig (string $module)
	{
		$config = new stdClass();

		$config->submodule = 'sap_b1_files';

		return $config;
	}

	public function GetSubmoduleProcessorConfigList (string $module)
	{
		$config = @$this->config->{$module};

		#o módulo nem sequer foi definido
		if (empty($config))
			return [];

		#não existe configuração de conector para este módulo
		if (!isset($config->processor) || is_null($config->processor))
			return [];

		return $config->processor;
		// {"faturamento": {"processor": [{"to": "Y", "from": "S", "column": "cancelada", "submodule": "replacer", "ignore_blank": false}]}}
	}

	/**
	 * Mutators
	 */

	public function getUserNamesAttribute ()
	{
		if (is_null($this->users) || empty($this->users) || count($this->users) <= 0)
			return '<i>Nenhuma Permissão Atribuída</i>';

		$names = [];
		$users = config('users');

		foreach ($this->users as $key)
		{
			if (!isset($users[$key]))
				continue;

			$names[] = $users[$key];
		}

		return implode(', ', $names);
	}

	public function getStatusNameAttribute ()
	{
		return $this->status ? 'Ativa' : 'Inativa';
	}

	/**
	 * Custom Scope
	 */

	public function scopeApenasAtivas ($query)
	{
		return $query->where('status', 1);
	}

	/**
	 * Relationship
	 */

	public function User ()
	{
		return $this->belongsTo(User::class);
	}
}
