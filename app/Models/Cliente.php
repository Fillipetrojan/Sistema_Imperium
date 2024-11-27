<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Cliente extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;

    protected $table = "cliente";
    protected $primaryKey = 'id_cliente'; // Define a PK como UUID
    public $incrementing = false; // Não é auto-incremental
    protected $keyType = 'string'; // Tipo da PK é string
    public $timestamps = false;
    protected $fillable =[
    	"nome_cliente",
    	"CPF_cliente",
    	"sexo_cliente",
    	"nascimento_cliente",
    	"email_cliente",
        "password"
    ];

    protected $hidden = ['password'];


    protected static function boot()
    {
    parent::boot();

    static::creating(function ($model) {
        $model->id_cliente = (string) \Illuminate\Support\Str::uuid();
        #dd($model->id_cliente); // Verifique se o UUID está sendo gerado aqui
        });
    }


}
