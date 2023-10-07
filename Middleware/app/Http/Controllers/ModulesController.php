<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use Exception;
use App\Exceptions\CannotExecuteConfiguration;
use App\Helpers\System;
use App\Models\Company;
use App\Models\Log\Import;
use App\Models\Log\Export;

class ModulesController extends Controller
{

	//PUBLIC INDEX
	public function index ()
	{
		if (!Auth::user()->HasSelectedCompany())
			return abort(404);

		//RETURN COMPACT USERS
		$companies = Company::all();

		return view('modules.index', [
			'company'			=> Company::findOrFail(Auth::user()->config->company),
			'modules'			=> System::GetAllModules(),
			'companies'			=> $companies,
		]);
	}

	public function company_select ($company)
	{
		$company = Company::findOrFail($company);
		$user = Auth::user();

		$user->setCompany($company->id);
		$user->save();

		if (Route::currentRouteName() == '')
			return route('company.configuration');

		return back();
	}

	public function connector_select (Request $request, $module)
	{
		// try
		// {
			$company = Auth::user()->MyCompany();
			$module = System::GetModuleFromKey($module);

			return view('modules.connectors', [
				'company'		=> $company,
				'module'		=> $module,
				'submodules'	=> System::GetAllSubmodulesConnectors(),
			]);
		// }
		// catch (Exception $exception)
		// {
		// 	return abort(404);
		// }
	}

	public function connector_config_null ($module)
	{
		try
		{
			$company = Auth::user()->MyCompany();
			$module = System::GetModuleFromKey($module);

			$company->SaveConnectorConfig($module->key, null);
			$company->save();

			return redirect()->route('company.connector', [$module->key])->withMessage('Configurações salvas com sucesso!');
		}
		catch (Exception $exception)
		{
			return abort(404);
		}
	}

	public function connector_config (Request $request, $module, $submodule)
	{
		// try
		// {
			$company = Auth::user()->MyCompany();
			$module = System::GetModuleFromKey($module);
			$submodule = System::GetSubmoduleConnectorFromKey($submodule);

			if ($request->isMethod('post'))
			{
				$config = $submodule->GetConfigFromRequestPost($request);
				$company->SaveConnectorConfig($module->key, $config);

				$company->save();

				return redirect()->route('company.connector', [$module->key])->withMessage('Configurações salvas com sucesso!');
			}

			return view($submodule->views['configuration'], [
				'company'		=> $company,
				'module'		=> $module,
				'submodule'		=> $submodule
			]);
		// }
		// catch (Exception $exception)
		// {
		// 	return abort(404);
		// }
	}

	public function processor_select ($module)
	{
		// try
		// {
			$company = Auth::user()->MyCompany();
			$module = System::GetModuleFromKey($module);

			return view('modules.processors', [
				'company'		=> $company,
				'module'		=> $module,
				'submodules'	=> System::GetAllSubmodulesProcessors()->keyBy('key'),
			]);
		// }
		// catch (Exception $exception)
		// {
		// 	return abort(404);
		// }
	}

	public function processor_config (Request $request, $module, $submodule, $index = null)
	{
		try
		{
			$company = Auth::user()->MyCompany();
			$module = System::GetModuleFromKey($module);
			$submodule = System::GetSubmoduleProcessorFromKey($submodule);

			if ($request->isMethod('post'))
			{
				$config = $submodule->GetConfigFromRequestPost($request);
				$company->SaveProcessorConfig($module->key, $config, $index);

				$company->save();

				return redirect()->route('company.processor', [$module->key])->with('success', "Processador salvo com sucesso!");
			}

			return view($submodule->views['configuration'], [
				'company'		=> $company,
				'module'		=> $module,
				'submodule'		=> $submodule,
				'index'			=> $index,
			]);
		}
		catch (Exception $exception)
		{
			dd($exception);
			return abort(404);
		}
	}

	public function processor_destroy ($module, $keyEdit)
	{
		try
		{
			$company = Auth::user()->MyCompany();
			$module = System::GetModuleFromKey($module);

			$config = (object) $company->config->{$module->key}->processor;

			unset($config->{$keyEdit});

			$company->DestroyProcessorConfig($module->key, $config, $keyEdit);

			$company->save();

			return redirect()->route('company.processor', [$module->key])->with('danger', "Processador excluido com sucesso");
		}
		catch (Exception $exception)
		{
			dd($exception);
			return abort(404);
		}
	}

	public function import (Request $request, $module)
	{
		$module = System::GetModuleFromKey($module);
		$company = Auth::user()->MyCompany();

		try
		{
			if ($request->isMethod('post'))
			{
				ini_set('memory_limit', '4g');						#permitir carregar muitos dados de uma só vez
				ini_set('max_execution_time', 60 * 60 * 3); 		#3 horas

				$results = $module->Import($request, $company);
				$model = $module->model;

				$log = new Import();
				$log->module = $module->key;
				$log->company_id = $company->id;
				$log->user_id = Auth::user()->id;
				$log->save();

				$count = 0;

				foreach ($results as $result)
				{
					$entity = new $model($result);
					$entity->log_import_id = $log->id;
					$entity->company_id = $company->id;
					$entity->save();

					$count++;
				}

				$count = number_format($count, 0, ',', '.');
				
				return redirect()->route('crud.list', [$module->key])->with('success', "{$count} novos registros importados com sucesso");
			}

			return view('modules.import', [
				'module'		=> $module,
				'company'		=> $company,
				'submodule'		=> $company->GetSubmoduleConnector($module->key),
			]);
		}
		catch (CannotExecuteConfiguration $exception)
		{
			return redirect()->route('company.import', [$module->key])->withErrors($exception->GetMessage());
		}
		catch (Exception $exception)
		{
			throw $exception;
			// abort(500);
		}
	}
	
	public function export ($module)
	{
		$company = Auth::user()->MyCompany();
		$module = System::GetModuleFromKey($module);
		
		return view('modules.export', [
			'module'		=> $module,
			'logs'			=> Export::With(['user'])
				->LatestFirst()
				->FromModule($module)
				->FromCompany($company)
				->get()
			,
		]);
	}

	public function export_generate ($module)
	{
		// try
		// {
			ini_set('memory_limit', '4g');						#permitir carregar muitos dados de uma só vez
			ini_set('max_execution_time', 60 * 60 * 3); 		#3 horas

			$company = Auth::user()->MyCompany();
			$module = System::GetModuleFromKey($module);
			$submodule = $company->GetSubmoduleExporter($module->key);

			$processors = $company->GetSubmoduleProcessorConfigList($module->key);
			$query = $module->GetModelQuery();
			$collection = $query->FromCompany($company)
				->OnlyNotExported()
				->get()
			;

			if ($collection->count() <= 0)
				return redirect()->route('company.export', [$module->key])->with('danger', 'Nenhum novo registro precisa ser exportado');
			
			$collection = $collection->map(function ($data) use ($processors) {

				foreach ($processors as $processor)
				{
					$submodule = System::GetSubmoduleProcessorFromKey($processor->submodule);
					$data = $submodule->Execute($data, $processor);
				}

				return $data;
	
			});

			$file = $submodule->Execute($collection, $module);

			$user = Auth::user();

			$log = new Export();
			$log->user_id = $user->id;
			$log->company_id = $user->MyCompany()->id;
			$log->filepath = $file['filepath'];
			$log->filename = $file['filename'];
			$log->module = $module->key;
			
			$log->save();

			foreach ($collection->chunk(5000) as $chunk)
			{
				$query
					->whereIn('id', $chunk->pluck('id')->all())
					->update([
						'log_export_id'	=> $log->id,
						'exported'		=> true,
					])
				;
			}

			// $submodule->Execute($)

			// $module->GenerateFile($company);

			return redirect()->route('company.export', [$module->key])->with('success', 'Arquivo exportado com sucesso');
		// }
		// catch (Exception $exception)
		// {
		// 	abort(500, $exception->GetMessage());
		// }
	}

	public function export_download ($export)
	{
		$export = Export::FindOrFail($export);

		return Storage::download($export->full_filename);

		return $export;
	}

	public function logs_import ($module)
	{
		// try
		// {
			$module = System::GetModuleFromKey($module);
			$company = Auth::user()->MyCompany();
			$logs = Import::with(['user'])->OnlyUnpurged()->FromModule($module)->FromCompany($company);
			
			return view('modules.logs', [
				'title'			=> 'Logs de Importação',
				'company'		=> $company,
				'module'		=> $module,
				'logs'			=> $logs->paginate(20),
				'purgeRoute'	=> 'company.logs.import.purge',
			]);
		// }
		// catch (Exception $exception)
		// {
		// 	return abort(404);
		// }
	}

	public function logs_import_purge ($module, $log)
	{
		$module = System::GetModuleFromKey($module);
		$company = Auth::user()->MyCompany();

		$log = Import::FromModule($module)->FromCompany($company)->FindOrFail($log);
		$log->Purge($module);

		return redirect()->route('company.logs.import', [$module->key])->with('success', 'Log expurgado com sucesso');
	}

	public function logs_export ($module)
	{
		// try
		// {
			$module = System::GetModuleFromKey($module);
			$company = Auth::user()->MyCompany();
			$logs = Export::with(['user'])->OnlyUnpurged()->FromModule($module)->FromCompany($company);
			
			return view('modules.logs', [
				'title'			=> 'Logs de Exportação',
				'company'		=> $company,
				'module'		=> $module,
				'logs'			=> $logs->paginate(20),
				'purgeRoute'	=> 'company.logs.export.purge',
			]);
		// }
		// catch (Exception $exception)
		// {
		// 	return abort(404);
		// }
	}

	public function logs_export_purge ($module, $log)
	{
		$module = System::GetModuleFromKey($module);
		$company = Auth::user()->MyCompany();

		$log = Export::FromModule($module)->FromCompany($company)>FindOrFail($log);

		$log->Purge($module);

		return redirect()->route('company.logs.export', [$module->key])->with('success', 'Log expurgado com sucesso');
	}
}
