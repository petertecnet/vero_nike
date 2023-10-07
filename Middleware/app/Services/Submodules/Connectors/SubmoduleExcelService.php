<?php

namespace App\Services\Submodules\Connectors;

use Illuminate\Http\Request;

use StdClass;
use App\Services\SubmoduleConnector;

class SubmoduleExcelService extends SubmoduleConnector
{
	public $key				= 'excel';
	public $name			= 'Arquivos XLS/CSV';
	public $description		= null;
	public $views			= [
		'configuration'			=> 'submodules.excel_config',
		'process'				=> '',
	];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-file-excel-o'];

	public function GetConfigFromRequestPost (Request $request) : StdClass
	{
		$config = new stdClass();

		$config->submodule = $this->key;
		$config->columns = $request->input('columns');
		$config->column = $request->input('column');
		$config->filters = [];

		return $config;
	}
}