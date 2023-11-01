<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class GerenciarUsuariosController extends Controller
{
    /**
     * Middlewares responsável pelo nível de acesso a aplicação note que User não tem aesso as rotas de edição, criação, atualização e destruição.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = User::paginate(3);
        $usuarios = $usuariosPage;
        return view('administrativo.painelUsuarios', compact('usuarios', 'usuariosPage'));
    }

    public function create()
    {
        return view('administrativo.cadastrarUsuario');
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

    public function store(Request $request)
    {
        $regras = [
            'name' => 'required|min:4|max:40',
            'email' => 'email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:1,2,3',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O campo nome deve ter no mínimo 4 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.confirmed' => 'A senha precisa ser confirmada.',
        ];

        $request->validate($regras, $feedback);

        $usuario = new User($request->all());
        $usuario->password = Hash::make($request->input('password'));
        $usuario->create($request->all());

        return redirect()->route('gerenciar_usuarios.index')->with('sucess', 'Usuário cadastrado realizado com sucesso');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $usuario = User::find($id);

        return view ('administrativo.editarUsuario', compact('usuario'));
    }

    public function update(Request $request, string $id)
    {
        $usuario = User::find($id);

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
        ];

        if ($request->filled('password')) {
            $dadosUsuario['password'] = Hash::make($request->input('password'));
        }

        $usuario->update($dadosUsuario);

        return redirect()->route('gerenciar_usuarios.index')->with('sucess', 'Usuário atualizado com sucesso');
    }

    public function destroy(string $id)
    {

        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->route('gerenciar_usuarios.index')->with('error', 'Usuário não encontrado.');
        }

        $usuario->status = 'desativado';
        $usuario->save();

        $usuario->delete();

        return redirect()->route('gerenciar_usuarios.index')->with('sucess', 'Usuário desativado com sucesso.');
    }
}
