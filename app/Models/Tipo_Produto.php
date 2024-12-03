<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Produto;

class Tipo_Produto extends Model
{
    protected $table = 'tipo_produto';
	protected $primaryKey ="id_tipo_produto"; // Sem chave primária
    public $timestamps = false;
    
    protected $fillable =[
    	"id_tipo_produto",
    	"nome_tipo_produto"
    ];

    public function produto()
	{
    	return $this->hasMany(Produto::class, 'id_tipo_produto');
	}
}
