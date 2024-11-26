<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>




<form>

<div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="input_nome"
    placeholder="Cliente@email.com" 
    id="id_nome" class="form-control" />
    <label class="form-label" for="id_nome">Nome Completo</label>
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" name="input_email"
    placeholder="Cliente@email.com" 
    id="id_email" class="form-control" />
    <label class="form-label" for="id_email">Email</label>
  </div>


  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" name="input_password"
    id="id_senha" class="form-control" />
    <label class="form-label" for="id_senha">Senha</label>
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" name="input_confirmar_password"
    id="id_confirmar_senha" class="form-control" />
    <label class="form-label" for="id_confirmar_senha">Confirmar senha</label>
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" id="id_CPF" class="form-control" />
    <label class="form-label" for="id_CPF">CPF</label>
  </div>


  <div data-mdb-input-init class="form-outline mb-4">
    <input type="date" id="id_nascimento" class="form-control" />
    <label class="form-label" for="id_nascimento">Data de nascimento</label>
  </div>


<div class="form-check">
  <input class="form-check-input"
  type="radio" name="input_sexo" value="M"
  id="id_masculino">
  <label class="form-check-label" for="id_masculino">
    Masculino
  </label>
</div>
<div class="form-check">
  <input class="form-check-input"
  type="radio" name="input_sexo" value="F"
  id="id_feminino">
  <label class="form-check-label" for="id_feminino">
    Feminino
  </label>
</div>



  <!-- Submit button -->
  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
</form>


</body>
</html>