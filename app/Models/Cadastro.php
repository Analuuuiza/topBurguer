<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $fillable = [
        'nome',
        'telefone',
        'endereco',
        'email',
        'CPF',
        'password',
        'imagem'
    ];
}
