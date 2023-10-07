<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */


	protected $view = 'crud.company';
	protected $route = 'companies';

	public function index ()
	{
		$user = Auth::user();

		$companyname = request('companyname');
		$companystatus = request('companystatus');
		$companydocument = request('companydocument');

		$companies = Company::query();

		// if( ! $user->HasPermission('company_config'))
		// 	$companies->where('user_id', '=', $user->id);
		
		if($companyname)
			$companies->where('name', 'like', "%{$companyname}%");

		if($companystatus)
			$companies->where('status', '=' , $companystatus);

		if($companydocument)
			$companies->where('CNPJ', '=' , "%{$companydocument}%");

		// dd($companies->paginate(8));
		
		return view($this->view . '.index', [
			'cads'			=> $companies->paginate(8),
			'companyname'	=> $companyname,
			'companystatus'	=> $companystatus,
			'companydocument'	=> $companydocument
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create ()
	{

		return view($this->view.'.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */ 
	public function store (CompanyRequest $request)
	{
		$company = new Company($request->all());
		$user = Auth::user();

		$company->user_id = $user->id;
		$company->save();

		$user->Companies()->save($company);
		$user->save();

		return redirect()->route($this->route . '.index')->with('success', "Cadastrado efetivado com sucesso!");  }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show ($id)
	{

		$cad = Company::find($id);
		if ($cad) {return view($this->view . '.show', compact('cad'));
		}
		return redirect()->back();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit ($id)
	{
		$cad = Company::findOrFail($id);

        $companyusers = Company::where('id', '=', $id)->get();
        $users = User::all();
		return view($this->view.'.update', compact('cad', 'companyusers', 'users'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update (Request $request, $id)
	{
		$cad = Company::findOrFail($id);

		if(!$cad):
			return redirect()->back();
		endif;

		$cad->update($request->all());
		

		return view($this->view.'.update', compact('cad'))->with('success', "Cadastrado atualizado com sucesso!");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy ($id)
	{
		$cad = Company::findOrFail($id);
		$cad->delete();

		return redirect()->route($this->route . '.index')->with('danger', "Cadastro excluido com sucesso");
	}
}
