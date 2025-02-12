<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IMPERIUM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style type="text/css">
      div
      {
        margin: 20px;
      }

    </style>
  </head>
<body>

  <div>

    <form action="Cadastrar-Funcionario" method="POST">
    @csrf
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_nome_funcionario" required
        placeholder="Marcos Vinicius Ruan Elias Ferreira" 
        id="id_nome_funcionario" class="form-control" />
        <label class="form-label" for="id_nome_funcionario">Nome Completo</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" name="input_email_funcionario" required
        placeholder="funcionario@email.com" 
        id="id_email_funcionario" class="form-control" />
        <label class="form-label" for="id_email_funcionario">Email</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" name="input_password_funcionario" required
        id="id_senha_funcionario" class="form-control" />
        <label class="form-label" for="id_senha_funcionario">Senha</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" name="input_confirmar_password_funcionario"
        id="id_confirmar_senha_funcionario" class="form-control" />
        <label class="form-label" for="id_confirmar_senha_funcionario">Confirmar senha</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_CPF_funcionario" required
        minlength="11" maxlength="11" 
        id="id_CPF_funcionario" class="form-control"/>
        <label class="form-label" for="id_CPF_funcionario">CPF</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="date" name="input_nascimento_funcionario" required
        id="id_nascimento_funcionario" class="form-control" />
        <label class="form-label" for="id_nascimento">Data de nascimento</label>
      </div>

    <div class="form-check">
      <input class="form-check-input" 
      type="radio" name="input_sexo_funcionario" value="M"
      id="id_masculino">
      <label class="form-check-label" for="id_masculino">
        Masculino
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input"
      type="radio" name="input_sexo_funcionario" value="F"
      id="id_feminino">
      <label class="form-check-label" for="id_feminino">
        Feminino
      </label>
    </div>

    <h4>Endereço</h4>

      <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" name="input_nome_rua" required
          placeholder="Rua..." 
          id="id_nome_rua" class="form-control" />
          <label class="form-label" for="id_nome_rua">Nome da Rua</label>
        </div>

      <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" name="input_numero_rua" required
          placeholder="000" 
          id="id_numero_rua" class="form-control" />
          <label class="form-label" for="id_numero_rua">Numero da Rua</label>
        </div>

      <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" name="input_complemento"
          placeholder="APT 000" 
          id="id_complemento" class="form-control" />
          <label class="form-label" for="id_complemento">Complemento (opcional)</label>
        </div>

      <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" name="input_CEP" required
          placeholder="00000000"
          minlength="8" maxlength="8"
          id="id_CEP" class="form-control" />
          <label class="form-label" for="id_CEP">CEP</label>
        </div>

      <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" name="input_bairro" required
          placeholder="Nome do Bairro" 
          id="id_bairro" class="form-control" />
          <label class="form-label" for="id_bairro">Bairro</label>
        </div>

      <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" name="input_cidade" required
          placeholder="Belo Horizonte" value="Belo Horizonte" 
          id="id_cidade" class="form-control" />
          <label class="form-label" for="id_cidade">Cidade</label>
        </div>

      <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" name="input_estado" required
          placeholder="MG" value="MG"
          minlength="2" maxlength="2"
          id="id_estado" class="form-control" />
          <label class="form-label" for="id_estado">Estado</label>
        </div>

    <h4>Contato</h4>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_DDD" required
        minlength="2" maxlength="2"
        placeholder="00"
        id="id_DDD" class="form-control" />
        <label class="form-label" for="id_DDD">DDD</label>
      </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_numero_contato" required
        placeholder="000000000"
        id="id_numero_contato" class="form-control" />
        <label class="form-label" for="id_numero_contato">Numero</label>
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