@extends('menu.menu_visitante')
 
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
	<h1 class="text-center">{{$mensagem}}</h1>
	@if(isset($imagem))
		<img src="{{ asset($imagem) }}" class="image-logo-bar">
	@endif
</div>

<div class="container mt-4">
	<div class="row">
		@foreach($produto as $exibir_produto)
			<div class="col-md-4 mb-4">
					<div class="card">
						<img src="data:image/jpeg;base64,{{base64_encode($exibir_produto->imagem_produto)}}"
						class="card-img-top img_resolucao"
						alt="Imagem do Card">
						<div class="card-body">
							<p class="card-text text-center">{{$exibir_produto->nome_produto}}</p>
							<p class="card-text text-center">R${{$exibir_produto->valor_produto}}</p>
							<input type="hidden" name="input_id_produto">
						</div>
					</div>
			</div>
		@endforeach
    </div>  
</div>
{{$produto->links()}}

@endsection