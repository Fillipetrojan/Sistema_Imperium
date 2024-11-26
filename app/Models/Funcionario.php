<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Authenticatable
{
    use HasFactory;

    protected $table = 'funcionario';
    protected $primaryKey = 'id_funcionario'; // Define a PK como UUID
    public $incrementing = false; // Não é auto-incremental
    protected $keyType = 'string'; // Tipo da PK é string
    protected $fillable =[
    	"nome_funcionario",
    	"CPF_funcionario",
    	"id_cargo",
    	"sexo_funcionario",
    	"nascimento_funcionario",
    	"email_funcionario"
    ];

    protected $hidden = ['password', 'remember_token'];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id_funcionario = (string) \Illuminate\Support\Str::uuid(); // Gera UUID automaticamente
        });
    }

    /*
    public function tarefa()
    {
        return $this->hasMany(Tarefa::class, "id_funcionario");
    }
    */
}
