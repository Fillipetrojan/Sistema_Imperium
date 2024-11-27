<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Funcionario_Controller;
use App\Http\Controllers\Usuario_Controller;
use App\Http\Controllers\Cliente_Controller;
use App\Http\Controllers\Endereco_Controller;
use App\Http\Controllers\Produto_Controller;


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

		Route::get("/Login Funcionario", [Funcionario_Controller::class, 'view_login']);

	/*
	|----------------------------------------------------------------------
	| CLIENTE
	|----------------------------------------------------------------------
	*/
		Route::get("/", [Cliente_Controller::class, 'view_login']);
		Route::get("/Login Cliente", [Cliente_Controller::class, 'view_login']);

		Route::post("Fazer login", [Cliente_Controller::class, "fazer_login"]);
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

	/*
	|----------------------------------------------------------------------
	| CLIENTE
	|----------------------------------------------------------------------
	*/

		Route::get("/Cadastro Cliente", [Cliente_Controller::class, 'form_cadastro_cliente']);


		Route::middleware(['auth:cliente'])->group(function ()
		{
			Route::get("Consultar Produtos", [Cliente_Controller::class, "consultar_produtos_cliente"]);
		});

	/*
	|----------------------------------------------------------------------
	| PRODUTO
	|----------------------------------------------------------------------
	*/



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

	/*
	|----------------------------------------------------------------------
	| CLIENTE
	|----------------------------------------------------------------------
	*/
		Route::post("/Cadastrar Cliente", [Cliente_Controller::class, 'cadastrar_cliente']);
	/*
	|----------------------------------------------------------------------
	| PRODUTO
	|----------------------------------------------------------------------
	*/




/*
Route::get('/', function () {
    return view('welcome');
});
*/
