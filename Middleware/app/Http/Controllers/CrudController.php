<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use Exception;
use App\Helpers\System;

class CrudController extends Controller
{
	public function list ($module)
	{
		// try
		// {
			$module = System::GetModuleFromKey($module);
			$company = Auth::user()->MyCompany();

			return view('crud.generic.list', [
				'title'		=> "Lista de Informações do Módulo: {$module->name}",
				'newItem'	=> ['url' => route('crud.create', [$module->key]), 'label'=>'Adicionar Novo Item'],
				'module'	=> $module,
				'entities'	=> $module->GetModelQuery()->FromCompany($company)->paginate(20),
			]);
		// }
		// catch (Exception $exception)
		// {
		// 	abort(500);
		// }
	}

	public function create (Request $request, $module)
	{
		$module = System::GetModuleFromKey($module);
		$entity = $module->GetNewEntity();

		return $this->edit($request, $module, $entity);
	}

	public function update (Request $request, $module, $entity)
	{
		$module = System::GetModuleFromKey($module);
		$entity = $module->GetModelQuery()->findOrFail($entity);

		return $this->edit($request, $module, $entity);
	}

	private function edit (Request $request, $module, $entity)
	{
		// try
		// {
			if ($request->isMethod('post') && $module->ValidadeRequestPost($request))
			{
				$company = Auth::user()->MyCompany();

				$entity->fill($request->all());
				$entity->company_id = $company->id;
				$entity->save();

				return redirect()->route('crud.list', [$module->key])->withMessage('Registro salvo com sucesso!');
			}

			return view('crud.generic.edit', [
				'module'	=> $module,
				'entity'	=> $entity,
			]);
		// }
		// catch (Exception $exception)
		// {
		// 	abort(500);
		// }
	}
}