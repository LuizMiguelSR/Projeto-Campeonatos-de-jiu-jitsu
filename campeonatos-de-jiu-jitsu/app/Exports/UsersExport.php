<?php

namespace App\Exports;

use App\Models\User;
use App\Models\AtletaInscricao;
use App\Models\Campeonato;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('atletas_inscricoes')
            ->join('campeonatos', 'atletas_inscricoes.campeonato_id', '=', 'campeonatos.id')
            ->select(
                'atletas_inscricoes.id',
                'atletas_inscricoes.nome',
                'atletas_inscricoes.email',
                'campeonatos.titulo',
                'campeonatos.estado',
                'campeonatos.cidade'
            )
            ->get();
    }
}
