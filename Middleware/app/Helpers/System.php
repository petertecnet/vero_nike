<?php

namespace App\Helpers;

use Exception;
use App\Services\Module;
use App\Services\SubmoduleConnector;
use App\Services\SubmoduleExporter;
use App\Services\SubmoduleProcessor;

class System
{
	public static function GetAllModules ()
	{
		$modules = config('system.modules');

		foreach ($modules as &$module)
			$module = new $module();

		return collect($modules);
	}

	public static function GetAllSubmodulesConnectors ()
	{
		$submodules = config('system.submodules.connectors');

		foreach ($submodules as &$submodule)
			$submodule = new $submodule();

		return collect($submodules);
	}

	public static function GetAllSubmodulesProcessors ()
	{
		$submodules = config('system.submodules.processors');

		foreach ($submodules as &$submodule)
			$submodule = new $submodule();

		return collect($submodules);
	}

	public static function GetModuleFromKey (string $key) : Module
	{
		$class = config("system.modules.{$key}");
		if (empty($class))
			throw new Exception('Invalid Module name');
		return new $class();
	}

	public static function GetSubmoduleProcessorFromKey (string $key) : SubmoduleProcessor
	{
		$class = config("system.submodules.processors.{$key}");

		if (empty($class))
			throw new Exception('Invalid Submodule name: ' . $key);

		return new $class();
	}

	public static function GetSubmoduleConnectorFromKey (string $key) : SubmoduleConnector
	{
		$class = config("system.submodules.connectors.{$key}");

		if (empty($class))
			throw new Exception('Invalid Submodule name: ' . $key);

		return new $class();
	}

	public static function GetSubmoduleExporterFromKey (string $key) : SubmoduleExporter
	{
		$class = config("system.submodules.exporters.{$key}");

		if (empty($class))
			throw new Exception('Invalid Submodule name: ' . $key);

		return new $class();
	}
}
