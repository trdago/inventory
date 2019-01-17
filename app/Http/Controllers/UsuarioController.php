<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Guard;

use Hash;
use App\User;
use App\Log;


class UsuarioController extends Controller 
{

	public function getusers()
	{
		$users = User::All();

		dd($users);

	}
	public function index()
	{
		// $l = Log::All();
		// dd($l);
		$logs = Log::orderby('id', 'DESC')->limit(10)->get();
		return view('index.admin', compact('logs'));
	}

	public function viewLogin()
	{
		return View('login');
	}

	public function loginAdmin(LoginUser $rq)
	{
		/*
		* las forma de recuperar es $rq->cmapo
		* campos que se esperan run, password
		*/

		// dd(User::All());

		$us = User::where('run', $rq->run)
				->first();

		if(!isset($us))
			dd("usuario no existe");
			// return redirect('/')->with('error', 'Error LOGIN!'); 
		dd("usuario existe", $rq->password, $us->password);
		// dd($rq->password , $us->password, Hash::check($rq->password , $us->password));
		if(Hash::check($rq->password , $us->password))
		{
			dd("contraseña correcta");
    		Auth::login($us);
    		// $this->log("sys", "login", "", "");
    		$mensaje ='Bienvenido '.Auth::user()->name;
    		// return redirect('/admin');

    		dd("logeado");
    		return redirect('/admin')
              ->with('msg', ['class'=>'alert-success', 
              'icon'=>'glyphicon-ok', 
              'msg'=> $mensaje]);

		}
		
		dd('contraeña incorrecta');
		return redirect('/'); 
		
	}

	public function logout()
	{
		// dd('adios');
		Auth::logout();
		return redirect('/'); 

	}


}

