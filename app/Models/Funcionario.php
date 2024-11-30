<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Funcionario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'funcionario';
    protected $primaryKey = 'id_funcionario'; // Define a PK como UUID
    public $incrementing = false; // Não é auto-incremental
    protected $keyType = 'string'; // Tipo da PK é string
    public $timestamps = false;
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
}
