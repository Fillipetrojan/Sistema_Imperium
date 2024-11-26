<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Authenticatable
{
    use HasFactory;

    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente'; // Define a PK como UUID
    public $incrementing = false; // Não é auto-incremental
    protected $keyType = 'string'; // Tipo da PK é string
    protected $fillable =[
    	"nome_cliente",
    	"CPF_cliente",
    	"sexo_cliente",
    	"nascimento_cliente",
    	"email_cliente"
    ];

    protected $hidden = ['password', 'remember_token'];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id_cliente = (string) \Illuminate\Support\Str::uuid(); // Gera UUID automaticamente
        });
    }

    /*
    public function tarefa()
    {
        return $this->hasMany(Tarefa::class, "id_cliente");
    }
    */
}
