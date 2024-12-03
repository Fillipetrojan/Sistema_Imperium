@extends('menu.menu_visitante')
 
@section('title', 'IMPERIUM')

@section('content')




@php
	switch ($nome_tipo_produto)
	{
        case 'Aliança':
            $mensagem = 'Felizes para sempre não tem preço!';
            #$imagem = 'caminho/para/alianca.jpg';
		break;

        case 'Colar':
            $mensagem = 'Você vai chamar atenção!';
            #$imagem = 'caminho/para/colar.jpg';
		break;

        case "Anel":
        	$mensagem= "Para pessoas finas!";
        break;

        Case "joia":
        	$mensagem= "Momentos especiais precisam de joias especiais!";

        default:
            $mensagem = 'Conheça nossos produtos!';
            #$imagem = 'caminho/para/padrao.jpg';
    }
@endphp

<div class="logo-bar font-white">
	<h1 class="text-center">{{$mensagem}}</h1>
</div>

<div class="container mt-4">
	<div class="row">
		@foreach($produto as $exibir_produto)
			<div class="col-md-4 mb-4">
				<form action="Adicionar Ao Carrinho" method="POST">
				@csrf
					<div class="card">
						<img src="data:image/jpeg;base64,{{base64_encode($exibir_produto->imagem_produto)}}"
						class="card-img-top img_resolucao" alt="Imagem do Card">
						<div class="card-body">
							<p class="card-text text-center">{{$exibir_produto->nome_produto}}</p>
						
							<p class="card-text text-center">R${{$exibir_produto->valor_produto}}</p>
							<input type="hidden" name="input_id_produto"
							value="{{ $exibir_produto->id_produto }}">

							<input type="hidden" name="input_valor_produto"
							value="{{ $exibir_produto->valor_produto }}">

							<input type="hidden" name="input_nome_produto"
							value="{{ $exibir_produto->nome_produto }}">
						</div>
					</div>
				</form>
			</div>
		@endforeach

    </div>  
</div>
{{$produto->links()}}


@endsection