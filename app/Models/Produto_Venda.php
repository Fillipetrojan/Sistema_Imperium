<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto_Venda extends Model
{
    protected $table = 'produto_venda';
    public $incrementing = false; // Desativa comportamento de ID auto-incrementado
    protected $primaryKey = null; // Sem chave primária
    public $timestamps = false;
    
    protected $fillable =[
    	"id_produto",
    	"id_venda",
    	"numero_produto",
    	"valor_produto"
    ];
}
