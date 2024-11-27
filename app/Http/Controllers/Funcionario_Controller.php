<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Funcionario_Controller extends Controller
{
	/*
	|----------------------------------------------------------------------
	| FORM
	|----------------------------------------------------------------------
	*/

		public function cadastrar_Funcionario (Funcionario $funcionario, Request $request)
        {
        	$funcionario->nome_funcionario=$request->input_nome_funcionario;
        	$funcionario->id_cargo=$request->input_id_cargo;
        	$funcionario->CPF_funcionario=$request->input_CPF_funcionario;
        	$funcionario->sexo_funcionario=$request->input_sexo;
        	$funcionario->nascimento_funcionario=$request->input_nascimento;
        	$funcionario->save();
            return back();
        }
		

	/*
	|----------------------------------------------------------------------
	| LOGIN
	|----------------------------------------------------------------------
	*/

	public function view_login()
	{
		return view("login.login_funcionario");
	}
}
