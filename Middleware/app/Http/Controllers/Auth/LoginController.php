<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
   

    use AuthenticatesUsers;
    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    //LOGIN CONTROLLER LOGOUT PARA HOME/LOGIN
    //LOGIN CONTROLLER LOGOUT PARA HOME/LOGIN
    //LOGIN CONTROLLER LOGOUT PARA HOME/LOGIN
    //LOGIN CONTROLLER LOGOUT PARA HOME/LOGIN


    protected function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/login');
    }

    //LOGIN CONTROLLER LOGOUT PARA HOME/LOGIN
    //LOGIN CONTROLLER LOGOUT PARA HOME/LOGIN
    //LOGIN CONTROLLER LOGOUT PARA HOME/LOGIN
    //LOGIN CONTROLLER LOGOUT PARA HOME/LOGIN
    
}
