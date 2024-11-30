@extends('menu.menu_funcionario')
 
@section('title', 'IMPERIUM')

@section('content')

	@foreach($cliente as $exibir_cliente)

		<div class="card margin_top width border border-secondary">
			<div class="card-header border border-secondary">
				{{$exibir_cliente->nome_cliente}}
			</div>
			<div class="card-body">

				@foreach($exibir_cliente->endereco as $exibir_endereco)
					<h5 class="card-title">
						{{$exibir_endereco->nome_rua}},
						{{$exibir_endereco->numero_rua}} -
						{{$exibir_endereco->complemento}}
					</h5>
					<h6 class="card-title">
						CEP: {{$exibir_endereco->CEP}},
						{{$exibir_endereco->cidade}}/
						{{$exibir_endereco->estado}}
					</h6>
				@endforeach

				@foreach($exibir_cliente->contato as $exibir_contato)
				<p class="card-text">
					({{$exibir_contato->DDD_contato}}) {{$exibir_contato->numero_contato}}
				</p>
				@endforeach

				@foreach($exibir_cliente->venda as $exibir_venda)
					<h4 class="card-title">Data da Venda: {{$exibir_venda->data}}</h4>
					@foreach($exibir_venda->produto as $exibir_produto)

							<p class="card-text">
								Produto: {{$exibir_produto->nome_produto}}
								<br>
								R$ {{$exibir_produto->pivot->valor_produto}}
								<br>
								Quantidade: {{$exibir_produto->pivot->numero_produto}}
								<br>
								Situação: 
							</p>
					@endforeach
				@endforeach
		
			</div>
		</div>
	@endforeach

@endsection