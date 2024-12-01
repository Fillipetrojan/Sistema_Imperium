<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Produto extends Model
{
    protected $table = 'tipo_produto';
	protected $primaryKey ="id_tipo_produto"; // Sem chave primária
    public $timestamps = false;
    
    protected $fillable =[
    	"id_produto",
    	"nome_tipo_produto"
    ];
}
