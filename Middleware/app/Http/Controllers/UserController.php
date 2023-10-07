<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Profile;
use App\Models\Company;
use App\Models\Company_User;
use Illuminate\Http\Request;
use App\Models\User;
use COM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */


	protected $view = 'crud.user';
	protected $route = 'users';

	public function index ()
	{
		$username = request('username');
		$useremail = request('useremail');

		$users = User::query();

		if($username)
			$users->where('name', 'like', "%{$username}%");

		if ($useremail)
			$users->where('email', '=' , $useremail);

		return view($this->view . '.index', [
			'cads'			=> User::paginate(8),
			'users'			=> $users->get(),
			'username'		=> $username,
			'useremail'		=> $useremail
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create ()
	{
		$profiles = Profile::all();
		$companies = Company::all();
		$currentCompanies = Company::all();

		return view($this->view.'.create', compact('profiles', 'companies', 'currentCompanies'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	public function store (UserRequest $request)
	{
		$user = new User();
		$user->fill($request->only(['name', 'login', 'email', 'profile_id']));
		$user->password = $request->input('password');
		$user->save();
		$user->RestrictSelectedCompany($request['companies']);
		$user->companies()->sync($request['companies']);


		return redirect()->route($this->route . '.index')->with('success', "Cadastrado efetivado com sucesso!");  }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show ($id)
	{

		$cad = User::find($id);
		if ($cad) {return view($this->view . '.show', compact('cad'));
		}
		return redirect()->back();
	}

	public function showme ()
	{
		$cad = Auth::user();

		if (!$cad)
			return redirect()->back();

		$cad->load('companies');

		return view($this->view . '.showme', [
			'companies'			=> Company::all(),
			'currentCompanies'	=> $cad->companies->pluck('id')->all(),
			'cad'			=> $cad,
			'profiles'		=> Profile::all(),
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit ($id)
	{
		$user = User::findOrFail($id);

		if(!$user)
			return redirect()->back();

		$user->load('companies');

		return view($this->view.'.update', [
			'cad'				=> $user,
			'profiles'			=> Profile::all(),
			'companies'			=> Company::all(),
			'currentCompanies'	=> $user->companies->pluck('id')->all(),
		]);
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
		$user = User::findOrFail($id);
		$user->fill($request->only(['name', 'login', 'email', 'profile_id']));
		$user->RestrictSelectedCompany($request['companies']);
		$user->companies()->sync($request['companies']);



        if($request->hasFile('avatar'))
        {

            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/img/'.$filename));
            $user->avatar = $filename;
            $user->save();

        }
		if ($request->filled('password'))
		{
			$user->password = $request->input('password');
		}

		$user->save();





		return redirect()->route($this->route . '.index')->with('success', "Cadastrado efetivado com sucesso!");








		// if($user->id == $user->id){

		// 	$profiles = Profile::all();
		// 	$mycompanies = Company::all();
		// 	return redirect()->route($this->route . '.showme')->with('success', "Cadastrado atualizado com sucesso!");
		// }

		return redirect()->route($this->route . '.showme')->with('success', "Cadastrado atualizado com sucesso!");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy ($id)
	{
		$cad = User::findOrFail($id);

		if ($cad->email == Auth::user()->email)
		{
			return redirect()->route($this->route . '.index')->with('danger', "Você não pode excluir seu próprio usuario");
		}
		$deleted = $cad->name;
		$cad->delete();
		return redirect()->route($this->route . '.index', )->with('success', "O cadastro ". $deleted ." foi excluido com sucesso");
	}

}
