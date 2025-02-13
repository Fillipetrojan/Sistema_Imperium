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

<link rel="stylesheet" href="{{ asset('CSS/Menu_cliente.css') }}">

</script>

</head>
<body background="{{ asset('image/backgroud_branco.jpg') }}">

<div class="logo-bar">
    <img src="{{ asset('image/Logotipo.jpg') }}"
    alt="Logo da empresa"
    class="image-logo-bar center">
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
        
        <li>
            <a href="{{url('Cadastro-Cliente')}}"
            class="mymenu btn btn-secondary"
            title="Home">Faça seu cadastro aqui!!</a>
        </li>

        <li>
            <a href="{{url('Login-Cliente')}}"

            class="mymenu btn btn-success"
            title="Home">Faça seu Login aqui!!</a>
        </li>
	</ul>
  
@yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>