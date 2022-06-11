<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Retorna a lista de Pets cadastrados
     *
     * @return Collection
     */
    public function index()
    {
        return Pet::get();
    }

    /**
     * cria um novo Pet no BD
     *
     * @param PetRequest $request
     * @return Pet
     */
    public function store(PetRequest $request): Pet
    {
        $dados = $request->all();

        return Pet::create($dados);
    }
}
