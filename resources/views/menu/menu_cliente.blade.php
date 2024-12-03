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

<style type="text/css">
	
	section#menu
    {
    	float: left;
    	position: relative;
    }
    .margin-left
    {
        margin-left: 20px;
        width: 80%;
    }
    body
    {
        margin-bottom: 50px;
    }

    table
    {
    	width: 80%;
    }

    .img_resolucao
    {
        width: auto;
        height: 200px;
        object-fit: cover; /* Ajusta a imagem para caber sem distorção */
    }
    .margin-20
    {
        margin-top: 20px;
    }

</style>

<link rel="stylesheet" href="{{ asset('CSS/Menu_cliente.css') }}">

</script>

</head>
<body>
	<ul class="mymenu">
        <h1>IMPERIUM</h1>
    	<li>
            <a href="{{url('Cliente/Consultar-Produtos')}}"
            class="mymenu"
            title="Home">Produtos</a>
        </li>
    	<li>
            <a href="{{url('Cliente/Atualizar-Dados')}}"
            class="mymenu" title="Sobre">Cadastrar Endereço</a>
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
            <a href="{{url('Cliente/Logout')}}"
            class="mymenu"
            title="Contato">Sair</a>
        </li>

        <li>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                Produtos
                </button>
                <ul class="dropdown-menu">
                    @foreach($tipo_produto as $exibir_tipo_produto)
                        <li>
                            <a class="dropdown-item"
                            href="{{ url('Cliente/Consultar-Produtos') }}/{{$exibir_tipo_produto->id_tipo_produto}}">
                                {{$exibir_tipo_produto->nome_tipo_produto}}
                            </a>
                        </li>
                    @endforeach
                    
                </ul>
            </div>
        </li>
	</ul>

@yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>