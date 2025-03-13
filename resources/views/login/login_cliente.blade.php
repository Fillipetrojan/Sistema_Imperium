<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IMPERIUM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
  </head>



<link rel="stylesheet" href="{{ asset('CSS/Menu_cliente.css') }}">

<body background="{{ asset('image/backgroud_branco.jpg') }}">

<div class="logo-bar font-white">
    <h1 class="text-center text-white">IMPERIUM</h1>

</div>

  <div>

    <form action="{{url('Fazer-login-Cliente')}}" method="post">
    @csrf
      <!-- Email input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" id="id_email_cliente"
        name="input_email_cliente" 
        class="form-control" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_email_cliente">Email Cliente</label>
      </div>

      <!-- Password input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password"
        id="id_senha_cliente"
        name="input_senha_cliente" 
        class="form-control" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_senha_cliente">Senha</label>
      </div>

      

      <!-- Submit button -->
      <button  type="submit" data-mdb-button-init data-mdb-ripple-init
      class="btn btn-primary btn-block mb-4">Acessar</button>


    </form>
  </div>

</body>
</html>