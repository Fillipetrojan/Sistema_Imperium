<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Contato;
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
	            $request->session()->regenerate();

	            

	            $usuario = Cliente::where('email_cliente', $email_cliente)
	                        ->first();

	            session(['usuario_id' => $usuario->id_cliente]);
	            session(['usuario_email' => $usuario->email_cliente]);


	            return redirect()->intended('/Consultar Produtos');
	        }else
	        {
	            
	        }
		}
	/*
	|----------------------------------------------------------------------
	| INSERT
	|----------------------------------------------------------------------
	*/
		public function cadastrar_cliente (Cliente $cliente, Endereco $endereco, Contato $contato, Request $request)
        {	

        	DB::beginTransaction();
        	try
        	{

        		// Cliente
		        $cliente->nome_cliente=$request->input_nome_cliente;
		        $cliente->CPF_cliente=$request->input_CPF_cliente;
		        $cliente->sexo_cliente=$request->input_sexo_cliente;
		        $cliente->nascimento_cliente=$request->input_nascimento_cliente;
		        $senha_cliente_cry=Hash::make($request->input_password_cliente);
		        $cliente->email_cliente=$request->input_email_cliente;
		        $cliente->password=$senha_cliente_cry;
		        $cliente->save();
		        $id_cliente=$cliente->id_cliente;


		        //Endereço
		        $endereco->id_dono=$id_cliente;
		        $endereco->numero_rua=$request->input_numero_rua;
		        $endereco->nome_rua=$request->input_nome_rua;
		        $endereco->complemento=$request->input_complemento;
		        $endereco->CEP=$request->input_CEP;
		        $endereco->bairro=$request->input_bairro;
		        $endereco->cidade=$request->input_cidade;
		        $endereco->estado=$request->input_estado;
		        $endereco->save();

		        //Contato
		        $contato->id_dono=$id_cliente;
		        $contato->DDD_contato=$request->input_DDD;
		        $contato->numero_contato=$request->input_numero_contato;
		        $contato->save();

		        DB::commit();
	            return back();

            }catch (\Exception $e)
            {
        
        		DB::rollBack();
        		return response()->json(
        			['error' => 'Erro ao criar cliente' . $e->getMessage()], 500
        		);
        	}

        }//public function cadastrar_cliente


    /*
	|----------------------------------------------------------------------
	| CONSULT
	|----------------------------------------------------------------------
	*/


	/*
	|----------------------------------------------------------------------
	| UPDATE
	|----------------------------------------------------------------------
	*/
}

