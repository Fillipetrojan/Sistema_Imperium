<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = "endereco";
    protected $primaryKey = 'id_endereco';
    public $timestamps = false;
    protected $fillable =[
    	"id_endereco",
    	"numero_rua",
    	"nome_rua",
    	"complemento",
    	"CEP",
    	"bairro",
        "estado",
        "cidade",
        "id_dono"
    ];
}
