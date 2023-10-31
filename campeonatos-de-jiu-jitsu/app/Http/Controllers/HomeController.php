<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;

class HomeController extends Controller
{
    public function index()
    {
        $campeonatos = Campeonato::all();
        return view('publico.inicio', compact('campeonatos'));
    }

    public function torneios()
    {
        $campeonatos = Campeonato::all();
        return view('publico.torneios', compact('campeonatos'));
    }

    public function torneio($id)
    {
        $campeonato = Campeonato::find($id);
        return view('publico.torneio', compact('campeonato'));
    }

    public function show($id)
    {
        $campeonato = Campeonato::find($id);
        return view('publico.inscricaoAtleta', compact('campeonato'));
    }
}
