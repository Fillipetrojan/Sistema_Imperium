<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


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

		public function fazer_login(Request $request)
		{

			$email_cliente = $request->input_email_cliente;

        	$senha_cliente=$request->input_senha_cliente;

			if (Auth::guard('cliente')->
				attempt(['email_cliente' => $email_cliente, "password" => $senha_cliente]))
	        {
	            echo "Login sucesso.";
	        }else
	        {
	            echo "Login Falha.";
	        }


		}




	/*
	|----------------------------------------------------------------------
	| INSERT
	|----------------------------------------------------------------------
	*/



		public function cadastrar_cliente (Cliente $cliente, Request $request)
        {	
	        $cliente->nome_cliente=$request->input_nome_cliente;
	        $cliente->CPF_cliente=$request->input_CPF_cliente;
	        $cliente->sexo_cliente=$request->input_sexo_cliente;
	        $cliente->nascimento_cliente=$request->input_nascimento_cliente;
	        $senha_cliente_cry=Hash::make($request->input_password_cliente);
	        $cliente->email_cliente=$request->input_email_cliente;
	        $cliente->password=$senha_cliente_cry;
	        $cliente->save();
            return back();
        }


}

