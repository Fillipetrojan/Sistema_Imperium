@extends('menu.menu_cliente')
 
@section('title', 'IMPERIUM')

@section('content')


@php
	switch ($nome_tipo_produto)
	{
        case 'Aliança':
            $mensagem = 'Felizes para sempre não tem preço!';
            $imagem = 'image/maos_casamento.jpg';
		break;

        case 'Colar':
            $mensagem = 'Você vai chamar atenção!';
            $imagem = 'image/colar.jpg';
		break;

        case "Anel":
        	$mensagem= "Para pessoas finas!";
        	$imagem = 'image/Anel.jpg';
        break;

        Case "Joia":
        	$mensagem= "Momentos especiais precisam de joias especiais!";
        	$imagem = 'image/Joia_01.jpg';
        break;

        default:
            $mensagem = 'Conheça nossos produtos!';
            $imagem = null;
    }
@endphp


<div class="logo-bar font-white">
	<h1 class="text-center text-white">{{$mensagem}}</h1>
	@if(isset($imagem))
		<img src="{{ asset($imagem) }}" class="image-logo-bar">
	@endif
</div>

<div class="container mt-4">
	<div class="row">
		@foreach($produto as $exibir_produto)
			<div class="col-md-4 mb-4">
				<form action="{{url('Cliente/Adicionar-Ao-Carrinho')}}" method="POST">
				@csrf
					<div class="card">
						<img src="data:image/jpeg;base64,{{base64_encode($exibir_produto->imagem_produto)}}"
						class="card-img-top img_resolucao" alt="Imagem do Card">
						<div class="card-body">
							<h5 class="card-title">{{$exibir_produto->nome_produto}}</h5>
							<p class="card-text">
								Tipo:
								{{ $exibir_produto->tipo_produto->nome_tipo_produto }}							
							</p>
							<p class="card-text">R${{$exibir_produto->valor_produto}}</p>

							<input type="hidden" name="input_id_produto"
							value="{{ $exibir_produto->id_produto }}">

							<input type="hidden" name="input_valor_produto"
							value="{{ $exibir_produto->valor_produto }}">

							<input type="hidden" name="input_nome_produto"
							value="{{ $exibir_produto->nome_produto }}">
							<button  type="submit"class="btn btn-secondary btn-block mb-4">
								Adicionar ao carrinho!
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