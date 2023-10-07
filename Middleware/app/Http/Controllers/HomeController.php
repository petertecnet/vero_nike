<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Modules\Cliente;
use App\Models\Modules\Faturamento;
use App\Models\Modules\Recebimento;
use App\Models\Modules\Estoque;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	//PUBLIC INDEX
	public function index()
	{
		$user=  Auth::user();

		//QUERY CONDITIONS FOR NIKE USER 1 OR 0;
		$profile_id = 1;
		//QUERY CONDITIONS FOR NIKE USER 1 OR 0;

		//ADD MODELS ABOVE STATISTICS NIKE CONDITIONS AND CHARTS GOOGLE JS
		//ADD MODELS ABOVE STATISTICS NIKE CONDITIONS AND CHARTS GOOGLE JS

		$users = User::where('profile_id', '=', $profile_id)->count();
				
			//GRAFICOS HOME //
			//GRAFICOS HOME //
			//GRAFICOS HOME //

		//$companies_grafic = Company::count();
		//$faturamentos_grafic = Faturamento::count();
		//$recebimentos_grafic = Recebimento::count(); // APRIMORAR PARA VALOR TOTAL EM REAIS APOS TER DADOS SUFICIENTES //
		//$clientes_grafic = Cliente::count();
		//$estoque_grafic = Estoque::count();

		$companies_grafic = Company::count();
		$faturamentos_grafic = Faturamento::count();
		$recebimentos_grafic = Recebimento::count(); // APRIMORAR PARA VALOR TOTAL EM REAIS APOS TER DADOS SUFICIENTES //
		$clientes_grafic = Cliente::count();
		$estoque_grafic = Estoque::count();


		$companies = Company::where('user_id', '=', $user->id);

		//ADD MODELS ABOVE STATISTICS NIKE CONDITIONS AND CHARTS GOOGLE JS
		//ADD MODELS ABOVE STATISTICS NIKE CONDITIONS AND CHARTS GOOGLE JS

		//RETURN COMPACT USERS
		return view('home.index', [

			//'users' => $users,
			//'companies' => $companies_grafic, 
			//'companies_grafic' => $companies_grafic,
			//'faturamentos_grafic' => $faturamentos_grafic,
			//'recebimentos_grafic' => $recebimentos_grafic,
			//'clientes_grafic' => $clientes_grafic,
			//'estoque_grafic' => $estoque_grafic,

			'users' => $users,
			'companies' => $companies_grafic, 
			'companies_grafic' => $companies_grafic,
			'faturamentos_grafic' => $faturamentos_grafic,
			'recebimentos_grafic' => $recebimentos_grafic,
			'clientes_grafic' => $clientes_grafic,
			'estoque_grafic' => $estoque_grafic,

		]);
	}

	public function test (Request $request)
	{
		ini_set('memory_limit', '1g');
		$result = null;
		$query = null;

		if ($request->isMethod('post'))
		{
			$query = $request->input('query');
			$query = $query;
			$result = DB::connection('voalle')->select(DB::raw($query));
		}

		return view('home.test', [
			'result'		=> $result,
			'query'			=> $query,
		]);
	}
}

//FINAL INDEX HOME CONTROLLER
//GET HOME CONTROLLER IN /HOME/index.blade.php
