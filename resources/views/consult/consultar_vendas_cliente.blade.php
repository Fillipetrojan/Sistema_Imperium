@extends('menu.menu_funcionario')
 
@section('title', 'IMPERIUM')

@section('content')
<div class="margin-left">
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

						@switch($exibir_venda->status_venda)

							@case("pendente")

								<div class="bg-info-subtle margin_top_100 padding">

							@break

							@case("aprovado")
								<div class="bg-success-subtle margin_top_100 padding">
							@break

							@default
								<div class="bg-light margin_top_100 padding">

						@endswitch

							<h5 class="card-title">Data da Venda: {{$exibir_venda->data}}</h5>
							<h5 class="card-title">Data de Pagamento: {{$exibir_venda->pagamento}}</h5>
							Situação: {{$exibir_venda->status_venda}}
							@foreach($exibir_venda->produto as $exibir_produto)

									<p class="card-text">
										Produto: {{$exibir_produto->nome_produto}}
										<br>
										R$ {{$exibir_produto->pivot->valor_produto}}
										<br>
										Quantidade: {{$exibir_produto->pivot->numero_produto}}
										<br>
									</p>
							@endforeach

							@if($exibir_venda->status_venda!="aprovado")
								<a type="button"
								class="btn btn-outline-success"
								href="{{url('Cliente/Gerar-Pix/')}}/{{$exibir_venda->id_app_max}}">Gerar PIX</a>

							@endif
						</div>
					@endforeach
			</div>
		</div>
	@endforeach
</div>
@endsection