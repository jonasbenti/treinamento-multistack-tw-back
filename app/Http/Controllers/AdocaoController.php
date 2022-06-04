<?php

namespace App\Http\Controllers;

use App\Models\Adocao;
use Illuminate\Http\Request;

class AdocaoController extends Controller
{
    /**
     * Cria um novo registro de adocao com as validacoes basicas
     *
     * @param Request $request
     * @return Adocao
     */
    public function store(Request $request): Adocao
    {
        $request->validate([
            "email" => ['required', 'email'],
            "valor" => ['required', 'numeric', 'between:10,2000'],
            "pet_id" => ['required', 'int', 'exists:pets,id']
        ]);

        $dados = $request->all();

        return Adocao::create($dados);
    }
}
