<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Campeonato;
use App\Models\Atleta;

class AtletaController extends Controller
{
    /**
     * Middleware especifico para autenticação de atletas
     */
    public function __construct()
    {
        $this->middleware('auth:atleta');
    }

    public function index()
    {
        return view('publico.areaAtleta')->with('sucess', 'Login realizado com sucesso');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
