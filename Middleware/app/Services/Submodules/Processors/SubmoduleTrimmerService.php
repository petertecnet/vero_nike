<?php

namespace App\Services\Submodules\Processors;

use Illuminate\Http\Request;

use StdClass;
use App\Services\Module;
use App\Services\SubmoduleProcessor;

class SubmoduleTrimmerService extends SubmoduleProcessor
{
	public $key				= 'trimmer';
	public $name			= 'Aparador de Espaços';
	public $description		= null;
	public $views			= [
		'configuration'			=> 'submodules.trimmer',
		'process'				=> '',
	];

	public function Execute ($row, $config)
	{
		$data = $row->{$config->column};

		if ($config->before === true)
			$data = ltrim($data);

		if ($config->after === true)
			$data = rtrim($data);

		if ($config->betweeen === true)
			$data = preg_replace('/\s+/', ' ', $data);

		$row->{$config->column} = $data;

		return $row;
	}

	public function GetPreview (?object $config, Module $module) : string
	{
		$coluna = $module->GetFieldByKey($config->column);

		$espacos = [];

		if ($config->before)
			$espacos[] = 'antes';

		if ($config->between)
			$espacos[] = 'entre';
			
		if ($config->after)
			$espacos[] = 'depois';

		$espacos = join(', ', $espacos);

		return "Altera a coluna <strong>{$coluna->name}</strong> removendos os seguintes espaços: <strong>{$espacos}</strong>.";
	}

	public function GetConfigFromRequestPost (Request $request) : stdClass
	{
		$config = new stdClass();

		$config->submodule = $this->key;
		$config->column = $request->input('coluna');
		$config->before = $request->input('before') == 1;
		$config->between = $request->input('between') == 1;
		$config->after = $request->input('after') == 1;

		return $config;
	}
}