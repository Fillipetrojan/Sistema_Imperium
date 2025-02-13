@extends('menu.menu_cliente')
 
@section('title', 'IMPERIUM')

@section('content')

	<form action="Atualizar-Endereco" method="POST">
		@csrf
		<div data-mdb-input-init class="form-outline mb-4 input_width-40">
	    	<input type="text" name="input_nome_rua"
	    	placeholder="Rua..."
	    	value="{{$endereco->nome_rua}}" 
	    	id="id_nome_rua" class="form-control" />
	    	<label class="form-label input_width-40" for="id_nome_rua"></label>
		</div>

		<div data-mdb-input-init class="form-outline mb-4">
	    	<input type="text" name="input_numero_rua"
	    	placeholder="000"
	    	value="{{$endereco->numero_rua}}"
	    	id="id_numero_rua" class="form-control input_width-40"/>
	    	<label class="form-label" for="id_numero_rua">Numero da Rua</label>
	    </div>

		<div data-mdb-input-init class="form-outline mb-4">
			<input type="text" name="input_complemento"
			placeholder="APT 000"
			value="{{$endereco->complemento}}"
			id="id_complemento" class="form-control input_width-40" />
			<label class="form-label" for="id_complemento">Complemento (opcional)</label>
		</div>

		<div data-mdb-input-init class="form-outline mb-4">
			<input type="text" name="input_CEP"
			placeholder="00000000"
			value="{{$endereco->CEP}}"
			id="id_CEP" class="form-control input_width-40" />
			<label class="form-label" for="id_CEP">CEP</label>
		</div>


		<div data-mdb-input-init class="form-outline mb-4">
			<input type="text" name="input_bairro"
			placeholder="Nome do Bairro"
			value="{{$endereco->bairro}}"
			id="id_bairro" class="form-control input_width-40" />
			<label class="form-label" for="id_bairro">Bairro</label>
		</div>


		<div data-mdb-input-init class="form-outline mb-4">
			<input type="text"
			placeholder="Belo Horizonte"
			value="{{$endereco->cidade}}"
			name="input_cidade" 
			id="id_cidade" class="form-control input_minimal" />
			<label class="form-label" for="id_cidade">Cidade</label>
		</div>
	      
		<div data-mdb-input-init class="form-outline mb-4">
			<input type="text"
			placeholder="MG"
			value="{{$endereco->estado}}"
			name="input_estado"
			id="id_estado" class="form-control input_minimal" />
			<label class="form-label" for="id_estado">Estado</label>
		</div>

		<button type="submit" class="btn btn-secondary">Atualizar</button>

    </form>

@endsection