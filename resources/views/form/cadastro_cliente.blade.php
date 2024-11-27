<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>




<form action="Cadastrar Cliente" method="POST">
@csrf
<div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="input_nome_cliente"
    placeholder="Marcos Vinicius Ruan Elias Ferreira" 
    id="id_nome_cliente" class="form-control" />
    <label class="form-label" for="id_nome_cliente">Nome Completo</label>
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" name="input_email_cliente"
    placeholder="Cliente@email.com" 
    id="id_email_cliente" class="form-control" />
    <label class="form-label" for="id_email_cliente">Email</label>
  </div>


  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" name="input_password_cliente"
    id="id_senha_cliente" class="form-control" />
    <label class="form-label" for="id_senha_cliente">Senha</label>
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" name="input_confirmar_password_cliente"
    id="id_confirmar_senha_cliente" class="form-control" />
    <label class="form-label" for="id_confirmar_senha_cliente">Confirmar senha</label>
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="input_CPF_cliente" 
    id="id_CPF_cliente" class="form-control"/>
    <label class="form-label" for="id_CPF_cliente">CPF</label>
  </div>


  <div data-mdb-input-init class="form-outline mb-4">
    <input type="date" name="input_nascimento_cliente" 
    id="id_nascimento_cliente" class="form-control" />
    <label class="form-label" for="id_nascimento">Data de nascimento</label>
  </div>


<div class="form-check">
  <input class="form-check-input"
  type="radio" name="input_sexo_cliente" value="M"
  id="id_masculino">
  <label class="form-check-label" for="id_masculino">
    Masculino
  </label>
</div>
<div class="form-check">
  <input class="form-check-input"
  type="radio" name="input_sexo_cliente" value="F"
  id="id_feminino">
  <label class="form-check-label" for="id_feminino">
    Feminino
  </label>
</div>



  <!-- Submit button -->
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Cadastrar</button>

</form>


</body>
</html>