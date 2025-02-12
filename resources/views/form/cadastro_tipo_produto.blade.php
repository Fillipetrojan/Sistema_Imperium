@extends('menu.menu_funcionario')
 
@section('title', 'IMPERIUM')

@section('content')


<div class="input_margin">
	<form action="Cadastrar-Tipo" method="POST">
	@csrf
		<div class="mb-3">
			<label for="id_nome_tipo_produto" class="form-label">Tipo de Produto</label>
			<input type="text"
			class="form-control"
			id="id_nome_tipo_produto"
			name="input_tipo_produto" 
			placeholder="Joia, Anel, Colar, etc..." 
			aria-describedby="emailHelp">
	  </div>

		<button type="submit" class="btn btn-dark">Cadastrar</button>

	</form>
</div>



@endsection