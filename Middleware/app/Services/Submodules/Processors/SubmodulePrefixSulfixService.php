<?php

namespace App\Services\Submodules\Processors;

use Illuminate\Http\Request;

use StdClass;
use App\Services\Module;
use App\Services\SubmoduleProcessor;

class SubmodulePrefixSulfixService extends SubmoduleProcessor
{
	public $key				= 'presulfix';
	public $name			= 'Prefixo e Sulfixo';
	public $description		= null;
	public $views			= [
		'configuration'			=> 'submodules.presulfix',
		'process'				=> '',
	];

	public function Execute ($row, $config)
	{
		$row->{$config->column} = $config->prefix . $row->{$config->column} . $config->sulfix;

		return $row;
	}

	public function GetPreview (?object $config, Module $module) : string
	{
		if (is_null(@$config->column))
			return '<i class="text-muted text-gray">Nenhuma coluna escolhida</i>';

		if (empty($config->prefix) && empty($config->sulfix))
			return '<i class="text-muted text-gray">Nenhuma alteração configurada</i>';

		$coluna = $module->GetFieldByKey($config->column);
		$changes = [];

		if (!empty($config->prefix))
			$changes[] = 'o prefixo <strong>' . $config->prefix . '</strong>';
			
			if (!empty($config->sulfix))
			$changes[] = 'o sulfixo <strong>' . $config->sulfix . '</strong>';

		$changes = implode(' e ', $changes);
			
		return "Adiciona {$changes} na coluna <strong>{$coluna->name}</strong>.";
	}

	public function GetConfigFromRequestPost (Request $request) : StdClass
	{
		$config = new stdClass();

		$config->submodule = $this->key;
		$config->column = $request->input('column');
		$config->prefix = $request->input('prefix');
		$config->sulfix = $request->input('sulfix');
		
		return $config;
	}
}