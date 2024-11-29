<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Estoque;

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

	/*
	|----------------------------------------------------------------------
	| INSERT
	|----------------------------------------------------------------------
	*/

		public function cadastrar_produto(Request $request, Produto $produto, Estoque $estoque)
		{

			DB::beginTransaction();
        	try
        	{

        		$produto->nome_produto=$request->input_nome_produto;
        		$produto->valor_produto=$request->input_valor_produto;
        		$produto->imagem_produto=file_get_contents($request->file("input_imagem_produto"));
        		#$imagem=$request->file("input_imagem_produto");

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
			        $isset_produto = true;
			        break;
			    }
			}


			if(!$isset_produto)
			{
				$carrinho[] =
				[
			        'id' => $request->input_id_produto,
			        'quantidade' => 1
			    ];
			}
			session()->put('carrinho', $carrinho);

			return back();

			
			/*
			$carrinho = session('carrinho', []);
			foreach ($carrinho as $key => $value)
			{
				foreach ($value as $key_value => $value_value)
				{
					if($key_value=="id")
					{
						echo "<br><br>ID do produto:$value_value";
					}
					if($key_value=="quantidade")
					{
						echo "<br>Quantidade:$value_value";
					}
				}
			}
			*/

		}

		public function apagar_carrinho()
		{
			session()->forget('carrinho');
			return back();
		}

	/*
	|----------------------------------------------------------------------
	| UPDATE
	|----------------------------------------------------------------------
	*/
}
