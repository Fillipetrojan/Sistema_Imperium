<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('image/Logotipo.jpg') }}" type="image/jpg">



<link rel="stylesheet" href="{{ asset('CSS/Menu_cliente.css') }}">

</script>

</head>
<body>

<body background="{{ asset('image/backgroud_branco.jpg') }}">

<div class="logo-bar">
    <img src="{{ asset('image/Logotipo.jpg') }}"
    alt="Logo da empresa"
    class="image-logo-bar center">
</div>

	<ul class="mymenu">
    	
    	<li>
            <a href="{{url('Cliente/Endereco')}}"
            class="mymenu" title="Sobre">Atualizar Endereço</a>
        </li>
    	<li>
            <a href="{{url('Cliente/Suporte')}}"
            class="mymenu" title="Portfolio">Suporte</a></li>
    	<li>
            <a href="{{url('Cliente/Apagar-Carrinho')}}"
            class="mymenu" title="Contato">Apagar Carrinho</a>
        </li>
        <li>
            <a href="{{url('Cliente/Ver-Carrinho')}}"
            class="mymenu" title="Contato">Ver Carrinho</a>
        </li>
        

        <li>
            <a href="{{url('Cliente/Consultar-Produtos')}}"
            class="mymenu"
            title="Home">Produtos</a>
        </li>

        @foreach($tipo_produto as $exibir_tipo_produto)
            <li>
                <a class="mymenu"
                href="{{ url('Cliente/Consultar-Produtos')}}/{{$exibir_tipo_produto->id_tipo_produto}}">
                    {{$exibir_tipo_produto->nome_tipo_produto}}
                </a>
            </li>
        @endforeach

        <li>
            <a href="{{url('Cliente/Consultar-Minhas-Compras')}}"
            class="mymenu" title="Sobre">Minhas Compras</a>
        </li>

        <li>
            <a href="{{url('Cliente/Logout')}}"
            class="mymenu btn btn-danger"
            title="Sair">Sair</a>
        </li>
	</ul>

@yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>