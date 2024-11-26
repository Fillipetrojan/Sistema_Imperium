<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class Cliente_Controller extends Controller
{

	/*
	|----------------------------------------------------------------------
	| FORM
	|----------------------------------------------------------------------
	*/

		public function form_cadastro_cliente()
		{
			return view("form.cadastro_cliente");
		}

	/*
	|----------------------------------------------------------------------
	| LOGIN
	|----------------------------------------------------------------------
	*/

	public function view_login()
	{
		return view("login.login_cliente");
	}


}
