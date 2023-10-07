<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $view = 'crud.customer';
    protected $route = 'company.customer';
    public function index($id)
    {
        $company_id=$id;
        $cads = Customer::where('company_id', '=', $company_id)->paginate(8);

        return view($this->view . '.index', compact('cads','company_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $company_id = $id;
        return view($this->view.'.create',compact('company_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        Customer::create($request->all());
           $id= $request->company_id;
        return redirect()->route($this->route . '.index', compact('id'))->with('success', "Cadastrado efetivado com sucesso!");  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cad = Customer::find($id);
        if ($cad) {
            return view($this->view . '.show', compact('cad'));
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($customer_id)
    {

        $cad = Customer::findOrFail($customer_id);
        $company_id = $cad->company_id;

        if(!$cad):
            return redirect()->back();
        endif;

        return view($this->view.'.update', compact('cad', 'company_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cad = Customer::findOrFail($id);
        $company_id = $cad->company_id;
        if(!$cad):
            return redirect()->back();
        endif;

        $cad->update($request->all());
        $id = $cad->id;

        return redirect()->back()->with('success', "Cadastrado atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cad = Customer::findOrFail($id);
        $cad->delete();

        return redirect()->route($this->route . '.index')->with('danger', "Cadastro excluido com sucesso");
    }





}
