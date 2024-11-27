<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>







	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">







<style type="text/css">
	
	section#menu
    {
    	float: left;
    	position: relative;
    }
    .Teste
    {
    	margin-top: 10px;
    }

    body
    {
        margin-bottom: 50px;
    }

    table
    {
    	width: 80%;
    }



</style>


<link rel="stylesheet" href="{{ asset('CSS/Menu_cliente.css') }}">


</script>

</head>
<body>


	<ul>
    	<li><a href="Consultar Produtos" class="mymenu" title="Home">Produtos</a></li>
    	<li><a href="Atualizar Dados" class="mymenu" title="Sobre">Atualizar dados cadastrais</a></li>
    	<li><a href="Suporte" class="mymenu" title="Portfolio">Suporte</a></li>
    	<li><a href="Contato" class="mymenu" title="Contato">Contato</a></li>
	</ul>


			
@yield('content')


	

</body>
</html>