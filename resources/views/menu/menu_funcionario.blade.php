<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">

    <link rel="icon" href="{{ asset('image/Logotipo.jpg') }}" type="image/jpg">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

<style type="text/css">
	
	section#menu
    {
    	float: left;
    	position: relative;
    }
    .input_margin
    {
    	margin-left: 20px;
        width: 60%;
    }
    .margin-left
    {
        margin-left: 20px;
    }
    .margin_top
    {
        margin-top: 30px; 
    }
    .width
    {
        width: 80%;
    }
    body
    {
        margin-bottom: 50px;
    }
    .center
    {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .logo-bar
    {
        background-color: rgba(14,14,13,255); /* Fundo preto  14,14,13,255*/
        text-align: center;      /* Centraliza o conteúdo horizontalmente */
        padding: 10px 0;         /* Espaçamento vertical da barra */ 
    }

    .image-logo-bar
    {
        width: 200px;
        display: block;
        margin-left: auto;
        margin-right: auto;
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

    .font-white
    {
        background-color: rgba(14,14,13,255);
        color: rgb(255,255,255);
    }

</style>

<link rel="stylesheet" href="{{ asset('CSS/Menu_funcionario.css') }}">

</script>

</head>
<body>

<div class="logo-bar">
    <img src="{{ asset('image/Logotipo.jpg') }}"
    alt="Logo da empresa"
    class="image-logo-bar">
</div>

	<ul class="mymenu font-white">
    	<li>
            <a href="{{url('Funcionario/Cadastro-Produto')}}"
            class="mymenu" title="Home">Cadastrar produto</a>
        </li>
        <li>
            <a href="{{url('Funcionario/Cadastro-Tipo')}}"
            class="mymenu" title="Home">Cadastrar um Tipo</a>
        </li>
    	<li>
            <a href="{{url('Funcionario/Cadastro-Endereco')}}"
            class="mymenu" title="Sobre">Cadastrar um endereço</a>
        </li>
        <li>
            <a href="{{url('Funcionario/Consultar-Vendas')}}"
            class="mymenu" title="Sobre">Consultar Vendas</a>
        </li>
        <li>
            <a href="{{url('Funcionario/Consultar-Produtos')}}"
            class="mymenu" title="Sobre">Consultar Produtos</a>
        </li>
        <li>
            <a href="Logout" class="mymenu" title="Contato">Sair</a>
        </li>
	</ul>
@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>