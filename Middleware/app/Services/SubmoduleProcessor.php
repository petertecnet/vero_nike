<?php

namespace App\Services;

use Illuminate\Http\Request;

use StdClass;
use App\Models\Company;
use App\Exception\NotImplementedException;

class SubmoduleProcessor
{
	public $key					= null;
	public $name				= null;
	public $description			= null;
	public $views				= [];
	public $layout_ConfigIcons	= ['type'=>'materialicons', 'class'=>'info_outline'];

	public function Import (Request $request, Company $company, $config)
	{
		throw new NotImplementedException();
	}

	public function Execute ($row, $config)
	{
		throw new NotImplementedException();
	}

	public function GetConfigFromRequestPost (Request $request) : StdClass
	{
		throw new NotImplementedException();
	}

	public function GetPreview (?object $config, Module $module) : string
	{
		throw new NotImplementedException();
	}
}