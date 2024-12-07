@extends('menu.menu_funcionario')
 
@section('title', 'IMPERIUM')

@section('content')



<form method="POST" action="Atualizar-produto">
@csrf
	<div class="input-group mb-3">
		<span class="input-group-text"
		id="basic-addon1">
			Nome
		</span>
		<input type="text" class="form-control"
		name="input_nome_produto" required 
		value="{{$produto->nome_produto}}" 
		placeholder="Nome do produto" aria-label="Username" aria-describedby="basic-addon1">
	</div>


	<div class="input-group mb-3">
		<span class="input-group-text"
		id="basic-addon1">
			COD do fornecedor:
		</span>
		<input type="text" class="form-control"
		value="{{$produto->cod_do_fornecedor}}" 
		name="input_COD_fornecedor" required 
		placeholder="0000" aria-label="Username" aria-describedby="basic-addon1">
	</div>


	<div class="input-group mb-3">
		<span class="input-group-text"
		id="basic-addon2" required>
			Valor R$
		</span>
		<input type="number" step="0.01" class="form-control"
		name="input_valor_produto"
		value="{{$produto->valor_produto}}" 
		placeholder="00.00" aria-label="Username" aria-describedby="basic-addon1">
	</div>

	<input type="hidden" name="input_id_produto"
	value="{{ $produto->id_produto }}">

    <button  type="submit"
    data-mdb-button-init
    data-mdb-ripple-init
    class="btn btn-primary btn-block mb-4">
    Atualizar Dados
    </button>
</form>

@endsection