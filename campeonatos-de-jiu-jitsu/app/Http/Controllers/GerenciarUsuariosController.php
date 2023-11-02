<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class GerenciarUsuariosController extends Controller
{
    /**
     * Middlewares responsável pelo nível de acesso a aplicação note que User não tem aesso as rotas de edição, criação, atualização e destruição.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio()
    {
        $usuarios = User::paginate(3);
        $usuarios = $usuariosPage;
        return view('administrativo.painelUsuarios', compact('usuarios', 'usuariosPage'));
    }

    /**
     * Metodos responsávies por mostrar a view, validar e amarzenar os dados no banco de dados
     */
    public function novo()
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_usuarios.inicio')->with('sucess', 'Acesso Negado.');
        }

        return view('administrativo.cadastrarUsuario');
    }

    public function armazenar(Request $request)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_usuarios.inicio')->with('sucess', 'Acesso Negado.');
        }

        $regras = [
            'name' => 'required|min:4|max:40',
            'email' => 'email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:Admin,User',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O campo nome deve ter no mínimo 4 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'email.unique' => 'Este email já está em uso. Por favor, escolha outro.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.confirmed' => 'A senha precisa ser confirmada.',
        ];

        $request->validate($regras, $feedback);

        $usuario = new User($request->all());
        $usuario->password = Hash::make($request->input('password'));
        $usuario->create($request->all());

        return redirect()->route('gerenciar_usuarios.inicio')->with('sucess', 'Usuário cadastrado realizado com sucesso');
    }

    /**
     * Metódos responsáveis por retornar a view de edição, atualiza os dados, valida e armazenar no banco de dados
     */
    public function editar(string $id)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_usuarios.inicio')->with('sucess', 'Acesso Negado.');
        }

        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->route('gerenciar_usuarios.inicio')->with('error', 'Usuário não encontrado.');
        }

        return view ('administrativo.editarUsuario', compact('usuario'));
    }

    public function atualizar(Request $request, string $id)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_usuarios.inicio')->with('sucess', 'Acesso Negado.');
        }

        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->route('gerenciar_usuarios.inicio')->with('error', 'Usuário não encontrado.');
        }

        $regras = [
            'name' => 'required|min:4|max:40',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O campo nome deve ter no mínimo 4 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
        ];

        $request->validate($regras, $feedback);

        $dadosUsuario = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ];

        if ($request->filled('password')) {
            $dadosUsuario['password'] = Hash::make($request->input('password'));
        }

        $usuario->update($dadosUsuario);

        return redirect()->route('gerenciar_usuarios.inicio')->with('sucess', 'Usuário atualizado com sucesso');
    }

    public function senhaEditar(string $id)
    {

        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->route('gerenciar_usuarios.inicio')->with('error', 'Usuário não encontrado.');
        }

        return view ('administrativo.editarSenhaUsuario', compact('usuario'));
    }

    public function senhaAtualizar(Request $request, string $id)
    {

        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->route('gerenciar_usuarios.inicio')->with('error', 'Usuário não encontrado.');
        }

        $regras = [
            'password' => 'required|min:8|confirmed',
        ];

        $feedback = [
            'password.required' => 'O campo Senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ];

        $request->validate($regras, $feedback);

        if ($request->filled('password')) {
            $dadosUsuario['password'] = Hash::make($request->input('password'));
        }

        $usuario->update($dadosUsuario);

        return redirect()->route('gerenciar_usuarios.inicio')->with('sucess', 'Senha atualizada com sucesso');
    }

    /**
     * Metódo responsável por realizar um sof delete no usuário, metódo de deleção amigável do Laravel. Importante administradores não podem se excluir
     */
    public function excluir(string $id)
    {
        if (auth()->user()->role !== 'Admin') {
            return redirect()->route('gerenciar_usuarios.inicio')->with('sucess', 'Acesso Negado.');
        }

        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->route('gerenciar_usuarios.inicio')->with('error', 'Usuário não encontrado.');
        }

        if (Auth::user()->role === $usuario->role) {
            return redirect()->route('gerenciar_usuarios.inicio')->with('error', 'Acesso Negado.');
        }

        $usuario->status = 'desativado';
        $usuario->save();

        $usuario->delete();

        return redirect()->route('gerenciar_usuarios.inicio')->with('sucess', 'Usuário desativado com sucesso.');
    }

    public function filtrar(Request $request)
    {
        $name = $request->query('name');
        $status = $request->query('status');
        $dataDe = $request->query('de');
        $dataAte = $request->query('ate');

        $query = User::query();

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        } elseif ($status) {
            $query->where('status', $status);
        } elseif($dataDe && $dataAte) {
            $query->whereBetween('created_at', [$dataDe, $dataAte]);
        } else {
            $usuariosPage = $query->paginate(3);
            $usuarios = $usuariosPage;

            return view('administrativo.painelUsuarios', compact('usuarios', 'usuariosPage'))->with('sucess', 'Nenhuma dos filtros foi aplicado.');
        }

        $usuariosPage = $query->paginate(3);
        $usuarios = $usuariosPage;

        return view('administrativo.painelUsuarios', compact('usuarios', 'usuariosPage'));
    }
}
