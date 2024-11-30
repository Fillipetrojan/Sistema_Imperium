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
}
