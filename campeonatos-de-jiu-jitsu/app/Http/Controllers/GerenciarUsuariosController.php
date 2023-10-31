<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class GerenciarUsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = User::all();
        return view('administrativo.painelUsuarios', compact('usuarios'));
    }

    public function create()
    {
        return view('administrativo.cadastrarUsuario');
    }

    public function listar(Request $request)
    {
        $query = User::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('de') && $request->has('ate')) {
            try {
                $dataDe = Carbon::createFromFormat('d m Y', $request->input('de'))->startOfDay();
                $dataAte = Carbon::createFromFormat('d m Y', $request->input('ate'))->endOfDay();
                $query->whereBetween('created_at', [$dataDe, $dataAte]);
            } catch (\Exception $e) {
                // Lida com a exceção, se ocorrer, por exemplo, se as datas fornecidas não estiverem no formato esperado.
                // Pode adicionar um log ou uma mensagem de erro aqui conforme necessário.
            }
        }

        $usuariosPage = $query->paginate(3);
        $usuarios = $usuariosPage;

        return redirect()->route('gerenciar_usuarios.index', compact('usuarios', '$usuariosPage'));
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
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->input('password'));
        }

        $usuario->save();

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
