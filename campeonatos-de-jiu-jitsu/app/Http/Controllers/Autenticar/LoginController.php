<?php

namespace App\Http\Controllers\Autenticar;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Atleta;

class LoginController extends Controller
{

    public function indexAdministrativo()
    {
        return view('administrativo.loginAdmin');
    }

    public function indexAtleta()
    {
        return view('publico.loginAtleta');
    }

    public function loginAtleta(Request $request)
    {
        $regras = [
            'email' => 'email',
            'password' => 'required|min:8',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
        ];

        $request->validate($regras, $feedback);

        $credenciais = $request->only('email', 'password');

        if (auth()->guard('atleta')->attempt($credenciais)) {

            $request->session()->regenerate();

            return redirect()->intended('home/area_atleta');

        }

        // Deslogar o usuário atual
        Auth::guard('atleta')->logout();

        // Limpar a sessão do usuário atual
        Session::flush();

        // Invalidar a sessão atual
        $request->session()->invalidate();

        // Regenerar o token de sessão
        $request->session()->regenerateToken();

        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ])->onlyInput('email');
    }

    public function loginAdministrativo(Request $request)
    {
        $regras = [
            'email' => 'email',
            'password' => 'required|min:8',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
        ];

        $request->validate($regras, $feedback);

        $credenciais = $request->only('email', 'password');

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();

            return redirect()->intended('gerenciar_usuarios');

        }

        // Deslogar o usuário atual
        Auth::guard('web')->logout();

        // Limpar a sessão do usuário atual
        Session::flush();

        // Invalidar a sessão atual
        $request->session()->invalidate();

        // Regenerar o token de sessão
        $request->session()->regenerateToken();

        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ])->onlyInput('email');
    }

    public function logoutAtleta(Request $request)
    {
        // Deslogar o usuário atual
        Auth::guard('web')->logout();
        Auth::guard('atleta')->logout();

        // Limpar a sessão do usuário atual
        Session::flush();

        // Invalidar a sessão atual
        $request->session()->invalidate();

        // Regenerar o token de sessão
        $request->session()->regenerateToken();

        return redirect()->route('login_atleta');
    }

    public function logoutAdministrativo(Request $request)
    {
        // Deslogar o usuário atual
        Auth::guard('web')->logout();
        Auth::guard('atleta')->logout();

        // Limpar a sessão do usuário atual
        Session::flush();

        // Invalidar a sessão atual
        $request->session()->invalidate();

        // Regenerar o token de sessão
        $request->session()->regenerateToken();

        return redirect()->route('login_administrativo');
    }
}
