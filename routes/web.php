<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Funcionario_Controller;
use App\Http\Controllers\Usuario_Controller;
use App\Http\Controllers\Cliente_Controller;
use App\Http\Controllers\Endereco_Controller;
use App\Http\Controllers\Produto_Controller;
use App\Http\Controllers\Visitante_Controller;
use App\Http\Controllers\AppMax_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
	/*
	|----------------------------------------------------------------------
	| FUNCIONARIO
	|----------------------------------------------------------------------
	*/
		Route::get("Login-Funcionario", [Funcionario_Controller::class, 'view_login']);
		Route::post("Fazer-login-Funcionario", [Funcionario_Controller::class, "fazer_login"]);
	/*
	|----------------------------------------------------------------------
	| CLIENTE
	|----------------------------------------------------------------------
	*/
		#Route::get("/", [Cliente_Controller::class, 'view_login']);
		Route::get("Login-Cliente", [Cliente_Controller::class, 'view_login']);
		Route::post("Fazer-login-Cliente", [Cliente_Controller::class, "fazer_login"]);
		
/*
|--------------------------------------------------------------------------
| GET
|--------------------------------------------------------------------------
*/
	/*
	|----------------------------------------------------------------------
	| FUNCIONARIO
	|----------------------------------------------------------------------
	*/
		Route::get("/Cadastro-Funcionario", [Funcionario_Controller::class, 'form_cadastro_funcionario']);

		Route::middleware(['auth:funcionario'])->group(function ()
		{
			Route::get("Funcionario/Logout", [Funcionario_Controller::class, "logout"]);
		});
	/*
	|----------------------------------------------------------------------
	| CLIENTE
	|----------------------------------------------------------------------
	*/
		Route::get("Cadastro-Cliente", [Cliente_Controller::class, 'form_cadastro_cliente']);

		Route::middleware(['auth:cliente'])->group(function ()
		{
			#Route::get("Cliente/Cadastro-Endereco", [Endereco_Controller::class, "form_cadastro_endereco"]);

			Route::get("Cliente/Endereco", [Endereco_Controller::class, "form_att_endereco"]);

			Route::get("Cliente/Logout", [Cliente_Controller::class, "logout"]);
		});
	/*
	|----------------------------------------------------------------------
	| VISITANTE
	|----------------------------------------------------------------------
	*/
		Route::get("/", [Produto_Controller::class, 'visitante_consultar_produtos']);

		Route::get("Visitante/Consultar-Produtos/{id_tipo_produto}", [Produto_Controller::class, "visitante_consultar_produtos"]);
	/*
	|----------------------------------------------------------------------
	| PRODUTO
	|----------------------------------------------------------------------
	*/
		Route::middleware(['auth:cliente'])->group(function ()
		{
			Route::get("Cliente/Apagar-Carrinho", [Produto_Controller::class, "apagar_carrinho"]);

			Route::get("Cliente/Ver-Carrinho", [Produto_Controller::class, "mostrar_carrinho"]);

			Route::get("Cliente/Fazer-Compra", [Produto_Controller::class, "fazer_compra"]);

			Route::get("Cliente/Consultar-Produtos/{id_tipo_produto}", [Produto_Controller::class, "cliente_consultar_produtos"]);

			Route::get("Cliente/Consultar-Produtos", [Produto_Controller::class, "cliente_consultar_produtos"]);
		});

		Route::middleware(['auth:funcionario'])->group(function ()
		{
			Route::get("Funcionario/Cadastro-Tipo", [Produto_Controller::class, "form_cadastro_tipo_produto"]);

			Route::get("Funcionario/Cadastro-Produto", [Produto_Controller::class, "form_cadastro_produto"]);

			Route::get("Funcionario/Consultar-Vendas", [Produto_Controller::class, "consultar_vendas"]);

			Route::get("Funcionario/Consultar-Produtos", [Produto_Controller::class, "funcionario_consultar_produtos"]);

			Route::get("Funcionario/Consultar-Produtos/{id_tipo_produto}", [Produto_Controller::class, "funcionario_consultar_produtos"]);
		});
/*
|--------------------------------------------------------------------------
| POST
|--------------------------------------------------------------------------
*/
	/*
	|----------------------------------------------------------------------
	| FUNCIONARIO
	|----------------------------------------------------------------------
	*/
		Route::post("/Cadastrar-Funcionario", [Funcionario_Controller::class, 'cadastrar_funcionario']);
	/*
	|----------------------------------------------------------------------
	| CLIENTE
	|----------------------------------------------------------------------
	*/
		Route::post("/Cadastrar-Cliente", [Cliente_Controller::class, 'cadastrar_cliente']);
	/*
	|----------------------------------------------------------------------
	| PRODUTO
	|----------------------------------------------------------------------
	*/
		Route::middleware(['auth:cliente'])->group(function ()
		{
			Route::post("Cliente/Adicionar-Ao-Carrinho", [Produto_Controller::class, "adicionar_ao_carrinho"]);

			Route::post("Cliente/Atualizar-Endereco", [Endereco_Controller::class, "att_endereco"]);
		});

		Route::middleware(['auth:funcionario'])->group(function ()
		{
			Route::post("Funcionario/Cadastrar-Produto", [Produto_Controller::class, 'cadastrar_produto']);

			Route::post("Funcionario/Cadastrar-Tipo", [Produto_Controller::class, 'cadastrar_tipo_produto']);

			Route::post("Funcionario/Atualiza-produto", [Produto_Controller::class, "form_atualizar_produto"]);

			Route::post("Funcionario/Atualizar-produto", [Produto_Controller::class, "atualizar_produto"]);
		});

		Route::post("webhook/pagamento", [AppMax_Controller::class, 'atualizar_venda']);
