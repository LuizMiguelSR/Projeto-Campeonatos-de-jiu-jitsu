<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;
use App\Models\AtletaInscricao;
use App\Models\Luta;

class GerenciarChaveamentoController extends Controller
{
    public function inicio()
    {
        $paginator = Campeonato::paginate(8);
        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];
        $campeonatos = $paginator;
        return view('administrativo.painelChaveamento', compact('campeonatos', 'estados', 'paginator'));
    }

    /**
     * Metodos responsáveis por gerar as duplas, separando por sexo, faixa e peso
     */
    public function gerarChaves($campeonatoId)
    {
        // Recupere todos os atletas do banco de dados
        $atletas = AtletaInscricao::where('campeonato_id', $campeonatoId);

        // Embaralhe a ordem dos atletas para gerar chaves aleatórias
        $atletasEmbaralhados = $atletas->shuffle();

        // Divida os atletas em pares para as chaves
        $pares = $atletasEmbaralhados->chunk(2);

        // Crie as chaves e evite confrontos entre membros da mesma equipe na primeira etapa
        $chaves = collect();
        foreach ($pares as $par) {
            // Verifique se os atletas do par pertencem à mesma equipe
            if ($this->mesmaEquipe($par[0], $par[1])) {
                // Mova um atleta para o próximo par para evitar confronto na primeira etapa
                $proximoPar = $pares->next();
                $proximoPar[] = $par[0];
                $chaves->push($proximoPar);
            } else {
                $chaves->push($par);
            }
        }

        // Salve as chaves no banco de dados ou em outra estrutura
        $this->salvarChavesNoBanco($chaves);

        return view('campeonato.chaves')->with(['chaves' => $chaves]);
    }

    private function mesmaEquipe($atleta1, $atleta2)
    {
        // Lógica para verificar se os atletas pertencem à mesma equipe
        return $atleta1->equipe == $atleta2->equipe;
    }

    private function salvarChavesNoBanco($chaves)
    {
        // Lógica para salvar as chaves no banco de dados
        foreach ($chaves as $par) {
            $chave = new Chave();
            // Salvar o par de atletas na chave
            // $chave->atleta1_id = $par[0]->id;
            // $chave->atleta2_id = $par[1]->id;
            $chave->save();
        }
    }

    /**
     * Metódo que responsável por realizar os filtros de dados
     */
    public function filtrar(Request $request)
    {
        $titulo = $request->query('titulo');
        $tipo = $request->query('tipo');
        $estado = $request->query('estado');
        $cidade = $request->query('cidade');

        $query = Campeonato::query();

        if ($titulo) {
            $query->where('titulo', 'like', '%' . $titulo . '%');
        }
        if ($tipo) {
            $query->where('tipo', $tipo);
        }
        if ($estado) {
            $query->where('estado', $estado);
        }
        if ($cidade) {
            $query->where('cidade', 'like', '%' . $cidade . '%');
        }

        $paginator = $query->paginate(8);
        $campeonatos = $paginator;

        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];

        return view('administrativo.painelCampeonatos', compact('campeonatos', 'paginator', 'estados'));
    }
}
