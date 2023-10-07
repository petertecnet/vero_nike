<?php

namespace App\Services\Submodules\Processors;

use Illuminate\Http\Request;

use StdClass;
use App\Services\Module;
use App\Services\SubmoduleProcessor;

class SubmoduleRegexService extends SubmoduleProcessor
{
	public $key				= 'regex';
	public $name			= 'Obtentor de Informações';
	public $description		= null;
	public $views			= [
		'configuration'			=> 'submodules.regex',
		'process'				=> '',
	];

	public function Execute ($row, $config)
	{
		$match = preg_match($config->regex, $row->{$config->column});

		if (!isset($match[0]) || !isset($match[0][0]))
			return $row;

		$row->{$config->column} = $match[0][0];

		return $row;
	}

	public function GetPreview (?object $config, Module $module) : string
	{
		if (is_null($config->column))
			return '<i class="text-muted text-gray">Nenhuma coluna escolhida</i>';

		$coluna = $module->GetFieldByKey($config->column);

		return "Obtém os dados da coluna <strong>{$coluna->name}</strong> através da expressão: <strong>/{$config->regex}/</strong>.";

		return json_encode($config);
	}

	public function GetConfigFromRequestPost (Request $request) : StdClass
	{
		$config = new stdClass();

		$config->submodule = $this->key;
		$config->column = $request->input('coluna');
		$config->regex = $request->input('regex');
		
		return $config;
	}
}