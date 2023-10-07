<?php

namespace App\Services\Submodules\Processors;

use Illuminate\Http\Request;

use StdClass;
use App\Services\Module;
use App\Services\SubmoduleProcessor;

class SubmoduleAcentuacaoService extends SubmoduleProcessor
{
	public $key				= 'acentos';
	public $name			= 'Remover Acentuação';
	public $description		= null;
	public $views			= [
		'configuration'			=> 'submodules.acentuacao',
		'process'				=> '',
	];

	public function Execute ($row, $config)
	{
		$row->{$config->column} = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/(Ç)/", "/(ç)/"), explode(" ","a A e E i I o O u U n N C c"), $row->{$config->column});

		return $row;
	}

	public function GetPreview (?object $config, Module $module) : string
	{
		if (is_null(@$config->column))
			return '<i class="text-muted text-gray">Nenhuma coluna escolhida</i>';

		$coluna = $module->GetFieldByKey($config->column);

		return "Remove caracteres acentuados da coluna <strong>{$coluna->name}</strong>.";
	}

	public function GetConfigFromRequestPost (Request $request) : StdClass
	{
		$config = new stdClass();

		$config->submodule = $this->key;
		$config->column = $request->input('column');
		
		return $config;
	}
}