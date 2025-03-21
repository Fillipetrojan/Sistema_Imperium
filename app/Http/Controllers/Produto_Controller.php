<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Estoque;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Produto_Venda;
use App\Models\Tipo_Produto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;



use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
			$tipo_produto=Tipo_Produto::select("id_tipo_produto", "nome_tipo_produto")
			->get();
			return view("form.cadastro_produto", compact("tipo_produto"));
		}

		public function form_cadastro_tipo_produto()
		{
			return view("form.cadastro_tipo_produto");
		}

		public function form_atualizar_produto(Request $request)
		{

			$id_produto=$request->input_id_produto;
			
			$query_produto=Produto::select([
				"id_produto",
				"nome_produto",
				"valor_produto",
				"produto.id_tipo_produto as id_tipo_produto",
				"cod_do_fornecedor"]);
			

			$produto=$query_produto->find($id_produto);
			
			return view("update.atualizar_produtos", compact("produto"));
		}
	/*
	|----------------------------------------------------------------------
	| SELECT
	|----------------------------------------------------------------------
	*/
		public function cliente_consultar_produtos($id_tipo_produto=null)
		{
			$query=Produto::select([
				"id_produto",
				"nome_produto",
				"valor_produto",
				"imagem_produto",
				"produto.id_tipo_produto as id_tipo_produto"]);
			if(!is_null($id_tipo_produto)) $query->where('id_tipo_produto', $id_tipo_produto);

			if(!is_null($id_tipo_produto))
			{
				$query->where('id_tipo_produto', $id_tipo_produto);
				$nome_tipo_produto=Tipo_Produto::where('id_tipo_produto', $id_tipo_produto)
				->value('nome_tipo_produto');
			}else
			{
				$nome_tipo_produto=null;
			}

			$query->with('tipo_produto');
		
			$produto=$query->paginate(6);

			Log::info("Teste Log");

			return view("consult.consultar_produtos_cliente", compact("produto", "nome_tipo_produto"));


		}

		public function visitante_consultar_produtos($id_tipo_produto=null)
		{
			$query=Produto::select([
			"nome_produto",
			"valor_produto",
			"imagem_produto"]);
	
			if(!is_null($id_tipo_produto))
			{
				$query->where('id_tipo_produto', $id_tipo_produto);
				$nome_tipo_produto=Tipo_Produto::where('id_tipo_produto', $id_tipo_produto)
				->value('nome_tipo_produto');
			}else
			{
				$nome_tipo_produto=null;
			}

			$produto=$query->paginate(6);

			return view("consult.consultar_produtos_visitante", compact("produto", "nome_tipo_produto"));
		}

		public function funcionario_consultar_produtos($id_tipo_produto=null)
		{
			$query=Produto::select([
				"id_produto",
				"nome_produto",
				"valor_produto",
				"imagem_produto",
				"cod_do_fornecedor",
				"produto.id_tipo_produto"])
			->with(["tipo_produto"])
			->orderBy('id_tipo_produto')
			->orderBy('nome_produto')
			->orderBy('cod_do_fornecedor');

			if(!is_null($id_tipo_produto))
			{
				$query->where('id_tipo_produto', $id_tipo_produto);
				$nome_tipo_produto=Tipo_Produto::where('id_tipo_produto', $id_tipo_produto)
				->value('nome_tipo_produto');
			}else
			{
				$nome_tipo_produto=null;
			}

			$produto=$query->paginate(6);

			return view("consult.consultar_produtos_funcionario", compact("produto"));
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
        	"input_COD_fornecedor"=>"required",
        	"input_valor_produto"=>'required|regex:/^\d+(\.\d{1,2})?$/',
        	"input_imagem_produto"=>'required|mimes:jpg,jpeg,png',
        	"input_id_tipo_produto"=>'required'
			]);
			DB::beginTransaction();
        	try
        	{
        		$produto->nome_produto=$request->input_nome_produto;
        		$produto->cod_do_fornecedor=$request->input_COD_fornecedor;
        		$produto->valor_produto=$request->input_valor_produto;
        		$produto->imagem_produto=file_get_contents($request->file("input_imagem_produto"));
        		$produto->id_tipo_produto=$request->input_id_tipo_produto;
        		$produto->save();

        		$estoque->id_produto=$produto->id_produto;
        		$estoque->numero_produto=0;
        		$estoque->save();
        		DB::commit();

        		return back();

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
			$quantidade_total=0;
			$valor_total=0;
			DB::beginTransaction();
			#try
			#{
				$carrinho = session('carrinho', []);

				$id_usuario=session("usuario_id");

				$id_usuario_app_max=session("usuario_id_app_max");

				$CPF_usuario=session("usuario_CPF");

				/// APP MAX
					$appMaxController = new AppMax_Controller();

					$carrinho = session('carrinho', []);

					$resultado_pedido=$appMaxController->Cadastrar_pedido_App_Max($request, $id_usuario_app_max, $carrinho);

					$id_pedido = $resultado_pedido->getData()->data->id;

					$Resultado_PIX=$appMaxController->Gerar_Pix($id_pedido, $id_usuario_app_max, $CPF_usuario);

					$QR_code = $Resultado_PIX['data']['pix_qrcode'];

					#$QR_code=$Resultado_PIX->getData()->data->pix_qrcode;

					$copia_cola = $Resultado_PIX['data']['pix_emv'];

					#$copia_cola = $Resultado_PIX->getData()->data->pix_emv;

					var_dump($resultado_pedido);
				
				$venda->id_cliente=$id_usuario;
				$venda->id_app_max=intval($id_pedido);
				$venda->data=Carbon::now();
				$venda->save();
				$id_venda = $venda->id_venda;

				$carrinho = session('carrinho', []);
				
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
					
					
				}// foreach ($carrinho as $exibir_carrinho => $item_carrinho)

				$venda->valor_venda=$valor_total;
				$venda->numero_produtos=$quantidade_total;

				$venda->save();
				DB::commit();

				session()->forget('carrinho');
				return view("api.QR_code_App_max", compact("QR_code", "copia_cola"));


			/*
			}catch (\Exception $e)
            {
        		DB::rollBack();
        		session()->forget('carrinho');
        		
        		return response()->json(
        			['error' => 'Erro ao fazer compra. ' . $e->getMessage()], 500
        		);
        	}
        	*/

        	


		}// public function fazer_compra


		public function cadastrar_tipo_produto(Request $request, Tipo_Produto $tipo_produto)
		{
			$tipo_produto->nome_tipo_produto=$request->input_tipo_produto;
			$tipo_produto->save();
			return back();
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
			        $item['valor_total']=$item['quantidade']*floatval($request->input_valor_produto);
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
			        'valor_total'=>floatval($request->input_valor_produto),
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

		public function atualizar_produto(Request $request)
		{
			$id_produto=$request->input_id_produto;
			$produto=Produto::find($id_produto);

			$produto->nome_produto=$request->input_nome_produto;
        	$produto->valor_produto=$request->input_valor_produto;
        	$produto->cod_do_fornecedor=$request->input_COD_fornecedor;

			$produto->save();
			return redirect()->intended('Funcionario/Consultar-Produtos');
		}

}
