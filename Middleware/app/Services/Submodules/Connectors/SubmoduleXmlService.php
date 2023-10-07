<?php

namespace App\Services\Submodules\Connectors;

use Illuminate\Http\Request;

use StdClass;
use App\Services\SubmoduleConnector;

class SubmoduleXmlService extends SubmoduleConnector
{
	public $key				= 'xml';
	public $name			= 'Arquivos XML';
	public $description		= null;
	public $views			= [
		'configuration'			=> 'submodules.xml_config',
		'process'				=> '',
	];
	public $layout_ConfigIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-file-code-o'];

	public function GetConfigFromRequestPost (Request $request) : StdClass
	{
		$config = new stdClass();

		$config->submodule = $this->key;
		$config->root = $request->input('root');
		$config->nodes = $request->input('nodes');
		$config->column = $request->input('column');
		$config->filters = [];

		return $config;
	}
}