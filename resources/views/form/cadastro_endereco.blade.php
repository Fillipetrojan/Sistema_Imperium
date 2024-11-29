@extends('menu.menu_cliente')
 
@section('title', 'IMPERIUM')

@section('content')

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_nome_rua"
        placeholder="Rua..." 
        id="id_nome_rua" class="form-control" />
        <label class="form-label" for="id_nome_rua">Nome da Rua</label>
      </div>


    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_numero_rua"
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
        <input type="text" name="input_CEP"
        placeholder="00000000" 
        id="id_CEP" class="form-control" />
        <label class="form-label" for="id_CEP">CEP</label>
      </div>


    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_bairro"
        placeholder="Nome do Bairro" 
        id="id_bairro" class="form-control" />
        <label class="form-label" for="id_bairro">Bairro</label>
      </div>


    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_cidade"
        placeholder="Belo Horizonte" value="Belo Horizonte" 
        id="id_cidade" class="form-control" />
        <label class="form-label" for="id_cidade">Cidade</label>
      </div>


    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="input_estado"
        placeholder="MG" value="MG" 
        id="id_estado" class="form-control" />
        <label class="form-label" for="id_estado">Estado</label>
      </div>

@endsection