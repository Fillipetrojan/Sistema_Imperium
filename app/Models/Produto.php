<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use App\Models\Tipo_Produto;

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
        "cod_do_fornecedor",
    	"imagem_produto"
    ];

    public function tipo_produto()
    {
        return $this->belongsTo(Tipo_Produto::class, "id_tipo_produto");
    }

    public function venda()
    {
        return $this->belongsToMany(Venda::class,
        'produto_venda', 'id_produto', 'id_venda')
        ->withPivot('quantidade', 'valor'); // Adiciona as colunas extras da tabela intermediária, se necessário.
    }



}
