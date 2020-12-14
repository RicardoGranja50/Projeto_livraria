<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $primaryKey="id_like";
    protected $table="likes"; 
    public $timestamps = false;

    protected $fillable=[

        'id_user',
        'id_livro',
    ];
}
