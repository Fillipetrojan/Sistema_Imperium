<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $primaryKey = 'id_produto';
    public $timestamps = false;
    
    protected $fillable =[
    	"nome_produto",
    	"id_produto",
    	"valor_produto",
    	"id_tipo_produto",
    	"imagem_produto"
    ];

    public function venda()
    {
        return $this->belongsToMany(Venda::class,
        'produto_venda', 'id_produto', 'id_venda')
        ->withPivot('quantidade', 'valor'); // Adiciona as colunas extras da tabela intermediária, se necessário.
    }

}
