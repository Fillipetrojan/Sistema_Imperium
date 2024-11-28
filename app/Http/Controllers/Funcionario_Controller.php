<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Funcionario;
use App\Models\Endereco;
use App\Models\Contato;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Funcionario_Controller extends Controller
{
	/*
	|----------------------------------------------------------------------
	| FORM
	|----------------------------------------------------------------------
	*/

		public function form_cadastro_funcionario()
		{
			return view("form.cadastro_funcionario");
		}
	/*
	|----------------------------------------------------------------------
	| INSERT
	|----------------------------------------------------------------------
	*/
		public function cadastrar_funcionario(Funcionario $funcionario,
			Endereco $endereco, Contato $contato, Request $request)
        {

        	DB::beginTransaction();
        	try
        	{
	        	$funcionario->nome_funcionario=$request->input_nome_funcionario;
	        	$funcionario->CPF_funcionario=$request->input_CPF_funcionario;
	        	$funcionario->sexo_funcionario=$request->input_sexo_funcionario;
	        	$funcionario->nascimento_funcionario=$request->input_nascimento;
	        	$funcionario->email_funcionario=$request->input_email_funcionario;

	        	$senha_funcionario_cry=Hash::make($request->input_password_funcionario);
	        	$funcionario->password=$senha_funcionario_cry;

	        	$funcionario->save();
	        	$id_funcionario=$funcionario->id_funcionario;

	        	//Endereço
		        $endereco->id_dono=$id_funcionario;
		        $endereco->numero_rua=$request->input_numero_rua;
		        $endereco->nome_rua=$request->input_nome_rua;
		        $endereco->complemento=$request->input_complemento;
		        $endereco->CEP=$request->input_CEP;
		        $endereco->bairro=$request->input_bairro;
		        $endereco->cidade=$request->input_cidade;
		        $endereco->estado=$request->input_estado;
		        $endereco->save();

		        //Contato
		        $contato->id_dono=$id_funcionario;
		        $contato->DDD_contato=$request->input_DDD;
		        $contato->numero_contato=$request->input_numero_contato;
		        $contato->save();

	            DB::commit();
	            return back();

	        }catch (\Exception $e)
            {
        
        		DB::rollBack();
        		return response()->json(
        			['error' => 'Erro ao criar funcionario' . $e->getMessage()], 500
        		);
        	}
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

	public function fazer_login(Request $request)
	{

		$email_funcionario = $request->input_email_funcionario;
        $senha_funcionario=$request->input_senha_funcionario;

		if (Auth::guard('funcionario')->
		attempt(['email_funcionario' => $email_funcionario, "password" => $senha_funcionario]))
	    {
	    	$request->session()->regenerate();
			$usuario = funcionario::where('email_funcionario', $email_funcionario)
	        ->first();

	        session(['usuario_id' => $usuario->id_funcionario]);
	        session(['usuario_email' => $usuario->email_funcionario]);


	        return redirect()->intended('/Cadastro Produto');
	    }else
	    {
	        return back();
	    }
	}
}
