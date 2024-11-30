<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Estoque;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Produto_Venda;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class Produto_Controller extends Controller
{
	/*
	|----------------------------------------------------------------------
	| FORM
	|----------------------------------------------------------------------
	*/

		public function form_cadastro_produto()
		{
			return view("form.cadastro_produto");
		}

	/*
	|----------------------------------------------------------------------
	| SELECT
	|----------------------------------------------------------------------
	*/
	
		public function cliente_consultar_produtos()
		{
			$produto=Produto::select(
				"id_produto",
				"nome_produto",
				"valor_produto",
				"imagem_produto")->get();

			return view("consult.consultar_produtos_cliente", compact("produto"));
		}

		public function consultar_vendas()
		{
			$cliente=Cliente::select(
				"cliente.id_cliente as id_cliente",
				"nome_cliente",
				"CPF_cliente",
				"email_cliente")
			->with([
				"venda.produto",
				"endereco",
				"contato"])
			->whereHas('venda')
			->get();

			return view("consult.consultar_vendas", compact("cliente"));
		}

	/*
	|----------------------------------------------------------------------
	| INSERT
	|----------------------------------------------------------------------
	*/

		public function cadastrar_produto(Request $request, Produto $produto, Estoque $estoque)
		{
			$request->validate([
        	"input_nome_produto"=>"required",
        	"input_valor_produto"=>'required|regex:/^\d+(\.\d{1,2})?$/',
        	"input_imagem_produto"=>'required|mimes:jpg,jpeg,png'
			]);
			DB::beginTransaction();
        	try
        	{
        		$produto->nome_produto=$request->input_nome_produto;
        		$produto->valor_produto=$request->input_valor_produto;
        		$produto->imagem_produto=file_get_contents($request->file("input_imagem_produto"));
        		$produto->save();

        		$estoque->id_produto=$produto->id_produto;
        		$estoque->numero_produto=0;
        		$estoque->save();
        		DB::commit();

        	}catch (\Exception $e)
            {
        
        		DB::rollBack();
        		return response()->json(
        			['error' => 'Erro ao cadastrar produto' . $e->getMessage()], 500
        		);
        	}
		}

		public function fazer_compra(Request $request, Produto $produto, Venda $venda)
		{
			$carrinho = session('carrinho', []);

			$quantidade_total=0;
			$valor_total=0;
			DB::beginTransaction();
			try
			{
				$id_usuario=session("usuario_id");
				$venda->id_cliente=$id_usuario;
				$venda->data=Carbon::now();
				$venda->save();
				$id_venda = $venda->id_venda;
				
				foreach ($carrinho as $exibir_carrinho)
				{

					Produto_Venda::create([
					"id_venda"=>$id_venda,
					"id_produto"=>$exibir_carrinho['id'],
					"numero_produto"=>$exibir_carrinho['quantidade'],
					"valor_produto"=>$exibir_carrinho['valor_total']
					]);

					$quantidade_total+=$exibir_carrinho['quantidade'];
					$valor_total+=$exibir_carrinho['valor_total'];
					$venda->valor_venda=$valor_total;
					$venda->numero_produtos=$quantidade_total;
					$venda->save();

				}// foreach ($carrinho as $exibir_carrinho => $item_carrinho)


				DB::commit();
				session()->forget('carrinho');
			}catch (\Exception $e)
            {
        		DB::rollBack();
        		session()->forget('carrinho');
        		return response()->json(
        			['error' => 'Erro ao fazer compra' . $e->getMessage()], 500
        		);
        	}
		}// public function fazer_compra

	/*
	|----------------------------------------------------------------------
	| CARRINHO
	|----------------------------------------------------------------------
	*/
		public function adicionar_ao_carrinho(Request $request)
		{
			$carrinho = session('carrinho', []);
			$isset_produto=false;

			foreach ($carrinho as &$item)
			{
			    if ($item['id'] === $request->input_id_produto)
			    {
			        $item['quantidade'] += 1; // Atualiza a quantidade
			        $item['valor_total']=$item['quantidade']*intval($request->input_valor_produto);
			        $isset_produto = true;
			        break;
			    }
			}

			if(!$isset_produto)
			{
				$carrinho[] =
				[
			        'id' => $request->input_id_produto,
			        'quantidade' => 1,
			        'valor_total'=>intval($request->input_valor_produto),
			        'nome_produto'=>$request->input_nome_produto
			    ];
			}
			session()->put('carrinho', $carrinho);

			return back();
		}

		public function apagar_carrinho()
		{
			session()->forget('carrinho');
			return back();
		}

		public function mostrar_carrinho()
		{
			$carrinho = session('carrinho', []);

			$quantidade_total=0;
			$valor_total=0;

			foreach ($carrinho as $exibir_carrinho => $item_carrinho)
			{
				foreach ($item_carrinho as $key => $value)
				{
					if($key=="quantidade")
					{
						$quantidade_total+=$value;
					}
					if($key=="valor_total")
					{
						$valor_total+=$value;
					}
				}
			}
			return view("consult.consultar_carrinho", compact(
				"carrinho", "quantidade_total", "valor_total"));
		}

	/*
	|----------------------------------------------------------------------
	| UPDATE
	|----------------------------------------------------------------------
	*/
}
