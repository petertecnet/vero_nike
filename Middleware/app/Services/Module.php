<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Exception\NotImplementedException;
use App\Helpers\System;
use App\Models\Company;
use App\Models\Log\Export;
use App\Services\Module;

class Module
{
	public $key					= null;
	public $name				= null;
	public $description			= null;
	public $model				= null;
	public $export				= null;
	public $fields				= [];
	public $layout_MenuIcons	= ['type'=>'fontawesome', 'class'=>'fa fa-cogs'];
	public $layout_ConfigIcons	= ['type'=>'materialicons', 'class'=>'info_outline'];

	public function Import (Request $request, Company $company)
	{
		$config = $company->GetSubmoduleConnectorConfig($this->key);
		$submodule = System::GetSubmoduleConnectorFromKey($config->submodule);

		return $submodule->Execute($request, $company, $config);
	}

	public function ValidadeRequestPost (Request $request) : array
	{
		throw new NotImplementedException();
	}

	public function GetPopulatedModelFromRequestPost (Request $request)
	{
		throw new NotImplementedException();
	}

	public function GetNewEntity ()
	{
		$model = $this->model;
		
		return new $model();
	}

	public function GetModelQuery ()
	{
		$model = $this->model;
		
		return $model::query();
	}

	public function GetFieldByKey (string $key)
	{
		$fields = collect($this->fields)->keyBy('field');

		return (object) @$fields[$key];
	}

	public function GetFieldsAsOptionValue ()
	{
		return collect($this->fields)->map(function ($field) {

			return (object) [
				'value'			=> $field['field'],
				'label'			=> $field['name'],
			];
		
		});
	}
}