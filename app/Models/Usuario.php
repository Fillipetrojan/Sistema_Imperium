<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{


	/*
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey="id_funcionario";

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome_funcionario', 'email_funcionario', "password"
    ];


    protected $hidden = [
        "password",
        'remember_token',
    ];


    protected $table="funcionario";

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }


    public function getAuthPassword()
    {
        return $this->password; // Campo que você usa para senha
    }

    */
}
