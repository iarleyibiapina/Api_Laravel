<?php

namespace App\Http\Controllers;

use App\Models\NoticiaModel;
use Illuminate\Http\Request;

// ?param - recebe pelo request - para fazer consultas

class NoticiaController extends Controller
{
    /**
     * Trazendo todas as noticias do banco.
     * 
     * @author Iarley Ibiapina
     */
    public function index(Request $request)
    {
        //
        $dadosNoticia = NoticiaModel::all();
        return response()->json([
            'noticiasArmazenadas' => $dadosNoticia,
        ]);
    }
}
