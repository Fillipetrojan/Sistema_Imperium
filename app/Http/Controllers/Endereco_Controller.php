<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Cliente;
use App\Models\Endereco;

class Endereco_Controller extends Controller
{
	/*
	|----------------------------------------------------------------------
	| FORM
	|----------------------------------------------------------------------
	*/
		public function form_cadastro_endereco()
		{
			return view("form.cadastro_endereco");
		}

		public function form_att_endereco()
		{
			$id_usuario=session("usuario_id");
			$endereco = Endereco::where("id_dono", "$id_usuario")
			->first();

			return view("update.atualizar_endereco", compact("endereco"));
		}
	/*
	|----------------------------------------------------------------------
	| UPDATE
	|----------------------------------------------------------------------
	*/

		public function att_endereco(Request $request)
		{
			$id_usuario=session("usuario_id");
			$endereco = Endereco::where("id_dono", $id_usuario)->first();
			try
			{
		        $endereco->numero_rua=$request->input_numero_rua;
		        $endereco->nome_rua=$request->input_nome_rua;
		        $endereco->complemento=$request->input_complemento;
		        $endereco->CEP=$request->input_CEP;
		        $endereco->bairro=$request->input_bairro;
		        $endereco->cidade=$request->input_cidade;
		        $endereco->estado=$request->input_estado;
		        $endereco->save();
		        return back();

		    }catch (\Exception $e)
            {
        		DB::rollBack();
        		return response()->json(
        			['error' => 'Erro ao adicionar endereço' . $e->getMessage()], 500
        		);
        	}
		}
	/*
	|----------------------------------------------------------------------
	| INSERT
	|----------------------------------------------------------------------
	*/
		public function cadastrar_endereco(Request $request, Endereco $endereco)
		{
			$id_usuario=session("usuario_id");
			try
			{
				$endereco->id_dono=$id_cliente;
		        $endereco->numero_rua=$request->input_numero_rua;
		        $endereco->nome_rua=$request->input_nome_rua;
		        $endereco->complemento=$request->input_complemento;
		        $endereco->CEP=$request->input_CEP;
		        $endereco->bairro=$request->input_bairro;
		        $endereco->cidade=$request->input_cidade;
		        $endereco->estado=$request->input_estado;
		        $endereco->save();

			}catch (\Exception $e)
            {
        
        		DB::rollBack();
        		return response()->json(
        			['error' => 'Erro ao adicionar endereço' . $e->getMessage()], 500
        		);
        	}
		}
	/*
	|----------------------------------------------------------------------
	| CONSULT
	|----------------------------------------------------------------------
	*/

}
