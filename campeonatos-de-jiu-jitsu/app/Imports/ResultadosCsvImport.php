<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Resultados;
use App\Models\Campeonato;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResultadosCsvImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $rows)
    {
        $codigo = Campeonato::where('codigo', $rows['campeonato_codigo'])->first();
        return new Resultados([
            'campeonato_id' => $codigo->id,
            'campeonato_codigo' => $rows['campeonato_codigo'],
            'sexo' => $rows['sexo'],
            'faixa' => $rows['faixa'],
            'peso' => $rows['peso'],
            'primeiro_colocado' => $rows['primeiro_colocado'],
            'segundo_colocado' => $rows['segundo_colocado'],
            'terceiro_colocado' => $rows['terceiro_colocado'],
        ]);
    }
}
