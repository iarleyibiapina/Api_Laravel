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

    /**
     * Armazena uma nova noticia
     *
     * @author Iarley Ibiapina
     */
    public function store(Request $request)
    {
        //
        if (empty($request->nome_noticia) || empty($request->conteudo_noticia)) return response('Dados vazios', 400);

        $dadosRequest = [
            'nome_noticia_tbn' => $request->nome_noticia,
            'conteudo_noticia_tbn' => $request->conteudo_noticia
        ];

        NoticiaModel::firstOrCreate($dadosRequest);
        return response()->json([
            'message' => "Dados inserido com sucesso",
        ]);
    }
}
