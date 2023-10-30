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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 3; // Defina o número desejado de itens por página

        $usuarios = User::withTrashed()->paginate($perPage);

        return view ('administrativo.painelUsuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrativo.cadastrarUsuario');
    }

    public function listar(Request $request)
    {
        $query = User::query();
        $query->withTrashed();

        // Filtrar por nome
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        // Filtrar por status
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        // Filtrar por um range de datas no campo created_at
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

        // Execute a consulta e obtenha os resultados paginados
        $usuariosPage = $query->paginate(3);
        $usuarios = $usuariosPage;

        return redirect()->route('gerenciar_usuarios.index', compact('usuarios', '$usuariosPage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'name' => 'required|min:3|max:40',
            'email' => 'email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:1,2,3',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
        ];

        $request->validate($regras, $feedback);

        $usuario = new User($request->all());
        //dd($usuario);
        $usuario->password = Hash::make($request->input('password'));
        $usuario->create($request->all());

        $msg = 'Cadastro realizado com sucesso';

        return redirect()->route('gerenciar_usuarios.index')->with('sucess', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::withTrashed()->findOrFail($id);

        return view ('administrativo.editarUsuario', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encontrar o usuário pelo ID
        $usuario = User::find($id);

        if (!$usuario) {
            // Tratar o caso em que o usuário não é encontrado
            return redirect()->route('gerenciar_usuarios.index')->with('error', 'Usuário não encontrado.');
        }

        $usuario->status = 'desativado';
        $usuario->save();

        // Realizar o soft delete
        $usuario->delete();

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('gerenciar_usuarios.index')->with('sucess', 'Usuário desativado com sucesso.');
    }
}
