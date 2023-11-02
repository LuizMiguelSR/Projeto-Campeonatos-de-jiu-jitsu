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

    public function inicio()
    {
        return view('publico.areaAtleta')->with('sucess', 'Login realizado com sucesso');
    }

}
