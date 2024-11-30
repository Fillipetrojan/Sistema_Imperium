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

	function validaCPF($cpf)
	{
 
    	// Extrai somente os números
	    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
	     
	    // Verifica se foi informado todos os digitos corretamente
	    if (strlen($cpf) != 11) {
	        return false;
	    }

	    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
	    if (preg_match('/(\d)\1{10}/', $cpf)) {
	        return false;
	    }

	    // Faz o calculo para validar o CPF
	    for ($t = 9; $t < 11; $t++) {
	        for ($d = 0, $c = 0; $c < $t; $c++) {
	            $d += $cpf[$c] * (($t + 1) - $c);
	        }
	        $d = ((10 * $d) % 11) % 10;
	        if ($cpf[$c] != $d) {
	            return false;
	        }
	    }
	    return true;
	}

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

			$email_cliente=$request->input_email_cliente;

        	$senha_cliente=$request->input_senha_cliente;

			if (Auth::guard('cliente')->
				attempt(['email_cliente' => $email_cliente, "password" => $senha_cliente]))
	        {
	            $request->session()->regenerate();

	            

	            $usuario = Cliente::where('email_cliente', $email_cliente)
	                        ->first();

	            session(['usuario_id' => $usuario->id_cliente]);
	            session(['usuario_email' => $usuario->email_cliente]);

	            return redirect()->intended('Cliente/Consultar Produtos');
	        }else
	        {
	            
	        }
		}

		public function logout(Request $request)
    	{
	        Auth::logout();
	        $request->session()->invalidate();

	        return redirect('Login Cliente');
    	}
	/*
	|----------------------------------------------------------------------
	| INSERT
	|----------------------------------------------------------------------
	*/
		public function cadastrar_cliente(Cliente $cliente, Endereco $endereco, Contato $contato, Request $request)
        {
        	$request->validate([
        	"input_nome_cliente"=>"required",
        	"input_CPF_cliente"=>"required|min:11|max:11",
        	"input_estado"=>"required|min:2|max:2",
        	"input_DDD"=>"required|min:2|max:2",
        	"input_CEP"=>"min:8|max:8"
			]);

        	DB::beginTransaction();
        	try
        	{

        		// Cliente
		        $cliente->nome_cliente=$request->input_nome_cliente;
		        $cliente->CPF_cliente=$request->input_CPF_cliente;

		        $valida_CPF=$this->validaCPF($request->input_CPF_cliente);
		        if(!$valida_CPF)
	        	{
	        		DB::rollBack();
	        		return back();

	        	}

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

