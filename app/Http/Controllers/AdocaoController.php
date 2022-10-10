<?php

namespace App\Http\Controllers;

use App\Adocao;
use Illuminate\Http\Request;
use App\Rules\AdocaoUnicaPet;
use App\Http\Requests\PetRequest;
use App\Http\Resources\AdocaoCollection;

class AdocaoController extends Controller
{
    public function index(){
        $adocoes = Adocao::with('pet')->get();

        return new AdocaoCollection($adocoes);
    }

    public function store(Request $request){
        //dd($request->all());
        $request->validate([
            'email' => ['required', 'email', new AdocaoUnicaPet($request->input('pet_id', 0))],
            'valor' => ['required', 'numeric', 'between:10,100'],
            'pet_id' => ['required', 'int', 'exists:pets,id']
        ]);

        $dadosAdocao = $request->all();

        return Adocao::create($dadosAdocao);
        //echo 'Controller de adoção';
    }
}
