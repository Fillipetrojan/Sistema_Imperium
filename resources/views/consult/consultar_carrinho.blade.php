@extends('menu.menu_cliente')
 
@section('title', 'IMPERIUM')

@section('content')

	@foreach($carrinho as $item_carrinho)
		<div class="card margin-20" style="width: 18rem;">
			<div class="card-body">
			    <h5 class="card-title">{{$item_carrinho['nome_produto']}}</h5>
			    <p class="card-text">Quantidade: {{$item_carrinho['quantidade']}}</p>
			    <p class="card-text">Valor total: {{$item_carrinho['valor_total']}}</p>
			</div>
		</div>
	@endforeach

@endsection