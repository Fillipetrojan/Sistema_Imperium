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

    <link rel="icon" href="{{ asset('image/Logotipo.jpg') }}" type="image/jpg">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('CSS/Menu_cliente.css') }}">

  </head>
<body background="{{ asset('image/backgroud_branco.jpg') }}">

<div class="logo-bar font-white">
    <h1 class="text-center text-white">Faça seu cadastro para poder realizar compras!!</h1>

</div>

  <div>

    <form action="Cadastrar-Cliente" method="POST">
    @csrf
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_nome_cliente" required 
        placeholder="Marcos Vinicius Ruan Elias Ferreira" 
        id="id_nome_cliente" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_nome_cliente">Nome Completo</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" name="input_email_cliente" required
        placeholder="Cliente@email.com"
        id="id_email_cliente" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_email_cliente">Email</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" name="input_password_cliente" required 
        id="id_senha_cliente" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_senha_cliente">Senha</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" name="input_confirmar_password_cliente"
        id="id_confirmar_senha_cliente" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_confirmar_senha_cliente">Confirmar senha</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_CPF_cliente" required 
        minlength="11"  maxlength="11" required
        id="id_CPF_cliente" class="form-control input_width-40"/>
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_CPF_cliente">CPF</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="date" name="input_nascimento_cliente"
        id="id_nascimento_cliente" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_nascimento">Data de nascimento (opcional)</label>
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

    <h4>Endereço</h4>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_nome_rua" required 
        placeholder="Rua..." 
        id="id_nome_rua" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_nome_rua">Nome da Rua</label>
      </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_numero_rua" required 
        placeholder="000" 
        id="id_numero_rua" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_numero_rua">Numero da Rua</label>
      </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_complemento"
        placeholder="APT 000" 
        id="id_complemento" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_complemento">Complemento (opcional)</label>
      </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_CEP" required
        maxlength="8" minlength="8"
        placeholder="00000000" 
        id="id_CEP" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_CEP">CEP</label>
      </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_bairro"
        placeholder="Nome do Bairro" 
        id="id_bairro" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_bairro">Bairro (opcional)</label>
      </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_cidade" required 
        placeholder="Belo Horizonte" value="Belo Horizonte" 
        id="id_cidade" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_cidade">Cidade</label>
      </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_estado"
        placeholder="MG" value="MG" maxlength="2" 
        id="id_estado" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_estado">Estado</label>
      </div>

    <h4>Contato</h4>

    <div data-mdb-input-init class="form-outline mb-4">
      <input type="text" name="input_DDD" maxlength="2" minlength="2" 
      placeholder="00"
      id="id_DDD" class="form-control input_width-40" />
      <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_DDD">DDD</label>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_numero_contato"
        placeholder="000000000"
        id="id_numero_contato" class="form-control input_width-40" />
        <label class="form-label bg-white text-dark rounded-lg border p-2 label-input" for="id_numero_contato">Numero</label>
      </div>

      <!-- Submit button -->
      <button  type="submit"
      data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
      Cadastrar
      </button>

    </form>

  </div>
</body>
</html>