<?php

namespace App\Services\Submodules\Processors;

use Illuminate\Http\Request;

use StdClass;
use App\Services\Module;
use App\Services\SubmoduleProcessor;

class SubmoduleExtractorService extends SubmoduleProcessor
{
	public $key				= 'extractor';
	public $name			= 'Extrator de Informação';
	public $description		= null;
	public $views			= [
		'configuration'			=> 'submodules.extractor',
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
		if (!isset($config->column_original) || !isset($config->column_destiny))
			return '<i class="text-muted text-gray">Nenhuma coluna escolhida</i>';

		$columnOriginal = $module->GetFieldByKey($config->column_original);
		$columnDestiny = $module->GetFieldByKey($config->column_destiny);

		$text =  "Extrai as informações da coluna <strong>{$columnOriginal->name}</strong> utilizando a regra <strong>{$config->regex}</strong> e colocar na coluna <strong>{$columnDestiny->name}</strong>";

		if (isset($config->only_empty) && $config->only_empty === true)
			$text .= '. Apenas se a coluna original estiver <strong>vazia</strong>';

		return $text;
	}

	public function GetConfigFromRequestPost (Request $request) : stdClass
	{
		$config = new stdClass();

		$config->submodule = $this->key;
		$config->column_original = $request->input('column_original');
		$config->column_destiny = $request->input('column_destiny');
		$config->only_empty = $request->input('only_empty') == 1;
		$config->regex = $request->input('regex');
		
		return $config;
	}
}