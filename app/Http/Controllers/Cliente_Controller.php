<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use Illuminate\Support\Str;


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

            #return back();


        }


}


/*

insert into "cliente" ("nome_cliente",
                       "CPF_cliente",
                       "sexo_cliente",
                       "nascimento_cliente",
                       "email_cliente",
                       "password",
                       "id_cliente")
                       values (Lavínia Giovana Lopes,
                               92714846653,
                               F,
                               1989-06-12,
                               lavinia_lopes@dcazzainteriores.com.br,
                               $2y$12$OtlGN7E0z8tjuxmOaTKwNeleoEivSurTbzPUonuzuW3oKolIRDzuO,
                               705619d1-5d69-47ed-93cd-8ff1718b81f4)

*/
