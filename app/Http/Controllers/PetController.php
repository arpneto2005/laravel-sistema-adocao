<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PetRequest;
use App\Pet;

class PetController extends Controller
{
    public function index(){
        return Pet::get();
        //echo 'Rota de listagem de Pets do controller';
    }

    public function store(PetRequest $request){
        //dd($dadosPet);
        $dadosPet = $request->all();
        return Pet::create($dadosPet);
        //echo 'Função do controller de pets para salvar os pets';
    }
}
