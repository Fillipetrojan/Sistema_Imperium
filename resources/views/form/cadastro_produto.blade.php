@extends('menu.menu_funcionario')
 
@section('title', 'IMPERIUM')

@section('content')


<form action="Cadastrar Produto" method="post" enctype="multipart/form-data">
	@csrf
	<div class="input-group mb-3">
		<span class="input-group-text"
		id="basic-addon1"
		
		>Nome</span>
		<input type="text" class="form-control"
		name="input_nome_produto"
		placeholder="Nome do produto" aria-label="Username" aria-describedby="basic-addon1">
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text"
		id="basic-addon2"
		>Valor R$</span>
		<input type="number" step="0.01" class="form-control"
		name="input_valor_produto"
		placeholder="00.00" aria-label="Username" aria-describedby="basic-addon1">
	</div>


	<div class="input-group mb-3">
		<span class="input-group-text"
		id="basic-addon2"
		>Foto do produto</span>
		<input type="file" class="form-control"
		name="input_imagem_produto"
		aria-label="Username" aria-describedby="basic-addon1"
		accept="image/*">
	</div>

	<button  type="submit"
    data-mdb-button-init data-mdb-ripple-init
    class="btn btn-secondary">
    	Cadastrar
	</button>

</form>




@endsection