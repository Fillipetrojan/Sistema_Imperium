<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = "contato";
    protected $primaryKey = 'id_contato';
    public $timestamps = false;
    protected $fillable =[
    	"id_contato",
    	"DDD_contato",
    	"numero_contato",
        "id_dono"
    ];
}
