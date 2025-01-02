@extends('menu.menu_funcionario')
 
@section('title', 'IMPERIUM')

@section('content')

<div class="container mt-4">
	<div class="row">
		@foreach($produto as $exibir_produto)
			<div class="col-md-4 mb-4">
				<form action="{{url('Funcionario/Atualiza-produto')}}" method="POST">
				@csrf
					<div class="card">
						<img src="data:image/jpeg;base64,{{base64_encode($exibir_produto->imagem_produto)}}"
						class="card-img-top img_resolucao" alt="Imagem do Card">
						<div class="card-body">
							<h5 class="card-title">{{$exibir_produto->nome_produto}}</h5>
							<h5 class="card-title">COD: {{$exibir_produto->cod_do_fornecedor}}</h5>
							<p class="card-text">R${{$exibir_produto->valor_produto}}</p>
							<p class="card-text">{{$exibir_produto->tipo_produto->nome_tipo_produto}}</p>
							<input type="hidden" name="input_id_produto"
							value="{{ $exibir_produto->id_produto }}">

							<button  type="submit"class="btn btn-secondary btn-block mb-4">
								Atualizar Produto
	  						</button>
						</div>
					</div>
				</form>
			</div>
		@endforeach

    </div>  
</div>
{{$produto->links()}}


@endsection