<?php

namespace App\Http\Controllers\Autenticar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class EsqueciSenhaController extends Controller
{

    public function mostrarFormularioReset()
    {
        return view('publico.esqueciSenha');
    }

    public function enviarSenhaEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? view('publico.resetSenha')
            : back()->withErrors(['email' => __($status)]);
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

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                    'remember_token' => \Str::random(60),
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login_atleta')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
