<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Campeonato;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth;

class GerenciarCampeonatosController extends Controller
{
    /**
     * Construtor responsável pela autenticação e nível de privilégio
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio()
    {
        $campeonatosPage = Campeonato::paginate(3);
        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];
        $campeonatos = $campeonatosPage;
        return view('administrativo.painelCampeonatos', compact('campeonatos', 'estados', 'campeonatosPage'));
    }

    public function novo()
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Acesso Negado.');
        }

        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];
        return view ('administrativo.cadastrarCampeonato', compact('estados'));

    }

    /**
     * Valida os dados vindos do formulário de cadastro de campeonatos e envia para a view para ser cropada
     */
    public function novoVerificar(Request $request)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Acesso Negado.');
        }

        $regras = [
            'titulo' => 'required|string',
            'codigo' => 'required|string',
            'imagem' => 'required|image|mimes:jpeg,png,jpg',
            'cidade' => 'required|string',
            'estado' => 'required|in:Acre,Alagoas,Amapá,Amazonas,Bahia,Ceará,Distrito Federal,Espírito Santo,Goiás,Maranhão,Mato Grosso,Mato Grosso do Sul,Minas Gerais,Pará,Paraíba,Paraná,Pernambuco,Piauí,Rio de Janeiro,Rio Grande do Norte,Rio Grande do Sul,Rondônia,Roraima,Santa Catarina,São Paulo,Sergipe,Tocantins',
            'data_realizacao' => 'required|date',
            'sobre_evento' => 'required|string',
            'ginasio' => 'required|string',
            'informacoes_gerais' => 'required|string',
            'entrada_publico' => 'nullable|string',
            'tipo' => 'required|in:Kimono,No-Gi',
            'fase' => 'required|in:Inscrição,Chaveamento,Resultado',
            'status' => 'required|in:Ativo,Inativo',
        ];

        $feedback = [
            'titulo.required' => 'O campo título é obrigatório.',
            'codigo.required' => 'O campo código é obrigatório.',
            'imagem.required' => 'O campo imagem é obrigatório.',
            'imagem.image' => 'O arquivo deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve ser do tipo jpeg, png ou jpg.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'estado.required' => 'O campo estado é obrigatório.',
            'data_realizacao.required' => 'O campo data de realização é obrigatório.',
            'data_realizacao.date' => 'A data de realização deve ser válida.',
            'sobre_evento.required' => 'O campo sobre o evento é obrigatório.',
            'ginasio.required' => 'O campo ginásio é obrigatório.',
            'informacoes_gerais.required' => 'O campo informações gerais é obrigatório.',
            'entrada_publico.string' => 'O campo entrada ao público deve ser uma string.',
            'tipo.required' => 'O campo tipo é obrigatório.',
            'tipo.in' => 'O campo tipo deve ser Kimono ou No-Gi.',
            'fase.required' => 'O campo fase é obrigatório.',
            'fase.in' => 'A fase deve ser inscrição, chaveamento ou resultado.',
            'status.required' => 'O campo status é obrigatório.',
            'status.in' => 'O status deve ser Ativo ou Inativo.',
        ];

        $request->validate($regras, $feedback);

        $imagem = $request->file('imagem');
        $nomeImagem = time().'.'.$imagem->getClientOriginalExtension();
        $imagem->move(public_path('images'), $nomeImagem);

        $dados = [
            'titulo' => $request->input('titulo'),
            'codigo' => $request->input('codigo'),
            'imagem' => $nomeImagem,
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'data_realizacao' => $request->input('data_realizacao'),
            'sobre_evento' => $request->input('sobre_evento'),
            'ginasio' => $request->input('ginasio'),
            'informacoes_gerais' => $request->input('informacoes_gerais'),
            'entrada_publico' => $request->input('entrada_publico'),
            'tipo' => $request->input('tipo'),
            'fase' => $request->input('fase'),
            'status' => $request->input('status'),
        ];

        $request->session()->put('nomeImagem', $nomeImagem);

        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];

        return view('administrativo.cadastrarCampeonatoCrop', compact('dados', 'estados'));
    }

    /**
     * Valida os dados revisados vindos do formulário de cadastro de campeonatos, cropa a imagem e armazena no servidor e armazena no banco de dados tanto os dados revisados como o caminho da imagem
     */
    public function crop(Request $request)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Acesso Negado.');
        }

        $regras = [
            'titulo' => 'required|string',
            'codigo' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|in:Acre,Alagoas,Amapá,Amazonas,Bahia,Ceará,Distrito Federal,Espírito Santo,Goiás,Maranhão,Mato Grosso,Mato Grosso do Sul,Minas Gerais,Pará,Paraíba,Paraná,Pernambuco,Piauí,Rio de Janeiro,Rio Grande do Norte,Rio Grande do Sul,Rondônia,Roraima,Santa Catarina,São Paulo,Sergipe,Tocantins',
            'data_realizacao' => 'required|date',
            'sobre_evento' => 'required|string',
            'ginasio' => 'required|string',
            'informacoes_gerais' => 'required|string',
            'entrada_publico' => 'nullable|string',
            'tipo' => 'required|in:Kimono,No-Gi',
            'fase' => 'required|in:Inscrição,Chaveamento,Resultado',
            'status' => 'required|in:Ativo,Inativo',
        ];

        $feedback = [
            'titulo.required' => 'O campo título é obrigatório.',
            'codigo.required' => 'O campo código é obrigatório.',
            'imagem.required' => 'O campo imagem é obrigatório.',
            'imagem.image' => 'O arquivo deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve ser do tipo jpeg, png ou jpg.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'estado.required' => 'O campo estado é obrigatório.',
            'data_realizacao.required' => 'O campo data de realização é obrigatório.',
            'data_realizacao.date' => 'A data de realização deve ser válida.',
            'sobre_evento.required' => 'O campo sobre o evento é obrigatório.',
            'ginasio.required' => 'O campo ginásio é obrigatório.',
            'informacoes_gerais.required' => 'O campo informações gerais é obrigatório.',
            'entrada_publico.string' => 'O campo entrada ao público deve ser uma string.',
            'tipo.required' => 'O campo tipo é obrigatório.',
            'tipo.in' => 'O campo tipo deve ser Kimono ou No-Gi.',
            'fase.required' => 'O campo fase é obrigatório.',
            'fase.in' => 'A fase deve ser inscrição, chaveamento ou resultado.',
            'status.required' => 'O campo status é obrigatório.',
            'status.in' => 'O status deve ser Ativo ou Inativo.',
        ];

        $request->validate($regras, $feedback);

        $nomeImagem = $request->session()->get('nomeImagem');
        $x = $request->input('x');
        $y = $request->input('y');
        $w = $request->input('w');
        $h = $request->input('h');

        $caminhoCompleto = public_path('images/' . $nomeImagem);

        $imagem = Image::make($caminhoCompleto)
        ->crop($w, $h, $x, $y)
        ->save(public_path('images/cropped_' . $nomeImagem));

        $caminhoImagemCortada = 'images/cropped_' . $nomeImagem;

        $request->session()->forget('nomeImagem');

        $campeonato = new Campeonato;

        $campeonato->titulo = $request->input('titulo');
        $campeonato->codigo = $request->input('codigo');
        $campeonato->imagem = $caminhoImagemCortada;
        $campeonato->cidade = $request->input('cidade');
        $campeonato->estado = $request->input('estado');
        $campeonato->data_realizacao = $request->input('data_realizacao');
        $campeonato->sobre_evento = $request->input('sobre_evento');
        $campeonato->ginasio = $request->input('ginasio');
        $campeonato->informacoes_gerais = $request->input('informacoes_gerais');
        $campeonato->entrada_publico = $request->input('entrada_publico');
        $campeonato->tipo = $request->input('tipo');
        $campeonato->fase = $request->input('fase');
        $campeonato->status = $request->input('status');

        $campeonato->save();

        return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Campeonato cadastrado com sucesso.');
    }

    /**
     * Métodos responsáveis, por retornar a view para a atualização dos campeonatos já cadastrados
     */
    public function editar(string $id)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Acesso Negado.');
        }

        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];
        $dados = Campeonato::find($id);
        return view('administrativo.editarCampeonato', compact('dados', 'estados'));
    }

    public function atualizar(Request $request, string $id)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Acesso Negado.');
        }

        $regras = [
            'titulo' => 'required|string',
            'codigo' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|in:Acre,Alagoas,Amapá,Amazonas,Bahia,Ceará,Distrito Federal,Espírito Santo,Goiás,Maranhão,Mato Grosso,Mato Grosso do Sul,Minas Gerais,Pará,Paraíba,Paraná,Pernambuco,Piauí,Rio de Janeiro,Rio Grande do Norte,Rio Grande do Sul,Rondônia,Roraima,Santa Catarina,São Paulo,Sergipe,Tocantins',
            'data_realizacao' => 'required|date',
            'sobre_evento' => 'required|string',
            'ginasio' => 'required|string',
            'informacoes_gerais' => 'required|string',
            'entrada_publico' => 'nullable|string',
            'tipo' => 'required|in:Kimono,No-Gi',
            'fase' => 'required|in:Inscrição,Chaveamento,Resultado',
            'status' => 'required|in:Ativo,Inativo',
        ];

        $feedback = [
            'titulo.required' => 'O campo título é obrigatório.',
            'codigo.required' => 'O campo código é obrigatório.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'estado.required' => 'O campo estado é obrigatório.',
            'data_realizacao.required' => 'O campo data de realização é obrigatório.',
            'data_realizacao.date' => 'A data de realização deve ser válida.',
            'sobre_evento.required' => 'O campo sobre o evento é obrigatório.',
            'ginasio.required' => 'O campo ginásio é obrigatório.',
            'informacoes_gerais.required' => 'O campo informações gerais é obrigatório.',
            'entrada_publico.string' => 'O campo entrada ao público deve ser uma string.',
            'tipo.required' => 'O campo tipo é obrigatório.',
            'tipo.in' => 'O campo tipo deve ser Kimono ou No-Gi.',
            'fase.required' => 'O campo fase é obrigatório.',
            'fase.in' => 'A fase deve ser inscrição, chaveamento ou resultado.',
            'status.required' => 'O campo status é obrigatório.',
            'status.in' => 'O status deve ser Ativo ou Inativo.',
        ];

        $request->validate($regras, $feedback);

        $campeonato = Campeonato::findOrFail($id);
        $nomeImagem = $campeonato->imagem;
        $x = $request->input('x');
        $y = $request->input('y');
        $w = $request->input('w');
        $h = $request->input('h');

        $caminhoCompleto = public_path($nomeImagem);

        $imagem = Image::make($caminhoCompleto)
        ->crop($w, $h, $x, $y)
        ->save(public_path($nomeImagem));

        $caminhoImagemCortada = $nomeImagem;

        $campeonato->update([
            'titulo' => $request->input('titulo'),
            'codigo' => $request->input('codigo'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'data_realizacao' => $request->input('data_realizacao'),
            'sobre_evento' => $request->input('sobre_evento'),
            'ginasio' => $request->input('ginasio'),
            'informacoes_gerais' => $request->input('informacoes_gerais'),
            'entrada_publico' => $request->input('entrada_publico'),
            'tipo' => $request->input('tipo'),
            'fase' => $request->input('fase'),
            'status' => $request->input('status'),
            'imagem' => $caminhoImagemCortada,
        ]);

        return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Campeonato atualizado com sucesso.');
    }

    /**
     * Método responsável por deletar usuários usando o soft delete do Laravel
     */
    public function excluir(string $id)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Acesso Negado.');
        }

        $campeonato = Campeonato::find($id);

        if (!$campeonato) {
            return redirect()->route('gerenciar_campeonatos.inicio')->with('error', 'Usuário não encontrado.');
        }

        $campeonato->delete();

        return redirect()->route('gerenciar_campeonatos.inicio')->with('sucess', 'Campeonato excluído com sucesso.');
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

        $campeonatosPage = $query->paginate(3);
        $campeonatos = $campeonatosPage;

        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];

        return view('administrativo.painelCampeonatos', compact('campeonatos', 'campeonatosPage', 'estados'));
    }

    /**
     * Metodo responsável por organizar os destaques clicando e arrastando
     */
    public function destaques()
    {
        $campeonatos = Campeonato::all();
        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];
        return view('administrativo.campeonatosDestaques', compact('campeonatos', 'estados'));
    }
    
    public function destaqueSalvar(Request $request)
    {
        dd($request);
        $campeonatos = Campeonato::all();
        $estados = [
            'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
            'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins',
        ];
        return view('administrativo.campeonatosDestaques', compact('campeonatos', 'estados'));
    }
}
