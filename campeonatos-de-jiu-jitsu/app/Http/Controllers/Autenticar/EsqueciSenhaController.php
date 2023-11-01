<?php

namespace App\Http\Controllers\Autenticar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\Atleta;

class EsqueciSenhaController extends Controller
{

    public function mostrarFormularioReset()
    {
        return view('publico.esqueciSenha');
    }

    public function enviarSenhaEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('atletas')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? view('publico.resetSenha')
            : back()->withErrors(['email' => __($status)])->dump();
    }

    public function senhaResetLink(Request $request, $token = null)
    {
        return view('publico.mudarSenha')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function senhaUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Atleta::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'E-mail não encontrado.']);
        }

        // Se o usuário foi encontrado, atualiza a senha e o token de lembrança
        $user->password = bcrypt($request->password);
        $user->remember_token = \Str::random(60);
        $user->save();

        // Redireciona para a rota de login com uma mensagem de sucesso
        return redirect()->route('login_atleta.index')->with('sucess', 'Senha redefinida com sucesso.');
    }
}
