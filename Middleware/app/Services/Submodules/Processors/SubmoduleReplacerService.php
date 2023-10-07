<?php

namespace App\Services\Submodules\Processors;

use Illuminate\Http\Request;

use StdClass;
use App\Services\Module;
use App\Services\SubmoduleProcessor;

class SubmoduleReplacerService extends SubmoduleProcessor
{
	public $key				= 'replacer';
	public $name			= 'Modificador de Texto';
	public $description		= null;
	public $views			= [
		'configuration'			=> 'submodules.replacer',
		'process'				=> '',
	];

	public function Execute ($row, $config)
	{
		if (!$config->ignore_blank && empty($row->{$config->column}))
			return $row;

		$row->{$config->column} = str_replace($config->from, $config->to, $row->{$config->column});

		return $row;
	}

	public function GetPreview (?object $config, Module $module) : string
	{
		if (is_null($config->column))
			return '<i class="text-gray text-muted">Informação indisponível</i>';

		$coluna = $module->GetFieldByKey($config->column);

		return "Altera a coluna <strong>{$coluna->name}</strong> de <strong>{$config->from}</strong> para <strong>{$config->to}</strong>";
	}

	public function GetConfigFromRequestPost (Request $request) : StdClass
	{
		$config = new stdClass();

		$config->submodule = $this->key;
		$config->column = $request->input('column');
		$config->ignore_blank = $request->input('ignore_blank') === 'true';
		$config->from = $request->input('from');
		$config->to = $request->input('to');

		return $config;
	}
}