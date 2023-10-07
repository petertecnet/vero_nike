<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use StdClass;
use App\Models\Company;
use App\Exception\NotImplementedException;
use App\Services\Module;

class SubmoduleExporter
{
	public $key					= null;
	public $name				= null;
	public $description			= null;
	public $views				= [];
	public $layout_ConfigIcons	= ['type'=>'materialicons', 'class'=>'info_outline'];

	public function CanExportForModule (Module $module) : bool
	{
		throw new NotImplementedException();
	}

	public function Execute (Collection $collection, Module $module)
	{
		throw new NotImplementedException();
	}
}