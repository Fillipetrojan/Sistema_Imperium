<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'venda';
    protected $primaryKey = 'id_venda';
    public $timestamps = false;
    
    protected $fillable =[
    	"id_venda",
    	"id_cliente",
    	"valor_venda",
    	"numero_produtos",
    	"data"
    ];



    public function produto()
    {
        return $this->belongsToMany(Produto::class,
        'produto_venda', 'id_venda', 'id_produto')
        ->withPivot('numero_produto', 'valor_produto')
        ->select(['produto.id_produto as id_produto','nome_produto']); 
    }
}
