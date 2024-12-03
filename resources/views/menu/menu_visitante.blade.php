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
    .margin-left
    {
        margin-left: 20px;
        width: 80%;
    }
    body
    {
        margin-bottom: 50px;
        background-repeat: no-repeat;
        background-size: 100%;
    }

    table
    {
    	width: 80%;
    }

    .img_resolucao
    {
        width: auto;
        height: 400px;
        object-fit: cover; /* Ajusta a imagem para caber sem distorção */
    }
    .margin-20
    {
        margin-top: 20px;
    }

    .center
    {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 200px;
    }

    .logo-bar
    {
        background-color: rgba(14,14,13,255); /* Fundo preto  14,14,13,255*/
        text-align: center;      /* Centraliza o conteúdo horizontalmente */
        padding: 10px 0;         /* Espaçamento vertical da barra */ 
    }

    .image-logo-bar
    {
        width: 500px;
        height: 300px;
        object-fit: cover;
    }

    .card
    {
        font-family: 'Montserrat';
        font-size: 22px;
    }

    .font-white
    {
        color: rgb(255,255,255);
    }


</style>

<link rel="stylesheet" href="{{ asset('CSS/Menu_cliente.css') }}">

</script>

</head>
<body background="{{ asset('image/backgroud_branco.jpg') }}">

<div class="logo-bar">

    <img src="{{ asset('image/Logotipo.jpg') }}"
    alt="Logo da empresa"
    class="center">
</div>

	<ul class="mymenu font-white">
    
    	<li>
            <a href="/"
            class="mymenu"
            title="Home">Todos os produtos</a>
        </li>

        @foreach($tipo_produto as $exibir_tipo_produto)
            <li>
                <a class="mymenu"
                href="{{ url('Visitante/Consultar-Produtos')}}/{{$exibir_tipo_produto->id_tipo_produto}}">
                    {{$exibir_tipo_produto->nome_tipo_produto}}
                </a>
            </li>

        @endforeach

	</ul>
  
@yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>