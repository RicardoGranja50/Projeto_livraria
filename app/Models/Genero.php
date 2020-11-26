<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    protected $primaryKey="id_genero";
    protected $table="generos"; 

    protected $fillable=[

        'designacao',
        'observacoes',
    ];

    public function livros(){
        return $this->hasMany('App\Models\Livro','id_genero');
    } 
}
