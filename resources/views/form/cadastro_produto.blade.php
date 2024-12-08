@extends('menu.menu_funcionario')
 
@section('title', 'IMPERIUM')

@section('content')

<div class="input_margin">

	<form action="Cadastrar Produto" method="post" enctype="multipart/form-data">
		@csrf
		<div class="input-group mb-3">
			<span class="input-group-text"
			id="basic-addon1">
				Nome
			</span>
			<input type="text" class="form-control"
			name="input_nome_produto" required 
			placeholder="Nome do produto" aria-label="Username" aria-describedby="basic-addon1">
		</div>


		<div class="input-group mb-3">
			<span class="input-group-text"
			id="basic-addon1">
				COD do fornecedor
			</span>
			<input type="text" class="form-control"
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
			placeholder="00.00" aria-label="Username" aria-describedby="basic-addon1">
		</div>

		<span class="input-group-text"
			id="basic-addon2">
				Foto do produto
		</span>
		<div class="input-group mb-3">
			<input type="file" class="form-control"
			name="input_imagem_produto"
			aria-label="Username" aria-describedby="basic-addon1"
			accept="image/*,.heic">
		</div>

		Tipo do produto
		<ul class="list-group">
			@foreach($tipo_produto as $exibir_tipo_produto)
			<label>
			<li class="list-group-item text-left">
				
					<input type="radio"
					name="input_id_tipo_produto"
					value="{{$exibir_tipo_produto->id_tipo_produto}}" 
					aria-label="Radio button for following text input">
					{{$exibir_tipo_produto->nome_tipo_produto}}
			</li>
			</label>
			@endforeach

		</ul>

		<button  type="submit"
	    data-mdb-button-init data-mdb-ripple-init
	    class="btn btn-secondary">
	    	Cadastrar
		</button>
	</form>
</div>

@endsection