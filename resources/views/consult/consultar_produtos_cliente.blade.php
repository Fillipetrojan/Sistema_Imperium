@extends('menu.menu_cliente')
 
@section('title', 'IMPERIUM')

@section('content')

<div class="container mt-4">
	<div class="row">


		@foreach($produto as $exibir_produto)
			<div class="col-md-4 mb-4">
				<div class="card">
					<img src="data:image/jpeg;base64,{{base64_encode($exibir_produto->imagem_produto)}}"
					class="card-img-top img_resolucao" alt="Imagem do Card">
					<div class="card-body">
						<h5 class="card-title">{{$exibir_produto->nome_produto}}</h5>
						<p class="card-text">R$ {{$exibir_produto->valor_produto}}</p>
						<a href="#" class="btn btn-secondary">Adicionar ao carrinho!</a>
					</div>
				</div>
			</div>


		@endforeach

    </div>  
</div>

@endsection