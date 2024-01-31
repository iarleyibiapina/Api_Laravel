<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticiaModel extends Model
{
    use HasFactory;

    protected $table = "tab_noticias";
    protected $primaryKey = "id_noticia_tbn";

    protected $fillable = [
        'nome_noticia_tbn',
        'conteudo_noticia_tbn',
    ];
}
