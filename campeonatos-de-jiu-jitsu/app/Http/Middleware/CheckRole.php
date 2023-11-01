<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role = null)
    {
        // Se nenhum papel específico for fornecido, apenas continue com a próxima solicitação
        dd($role);
        if ($role === null) {
            return $next($request);
        }

        // Verifique se o usuário tem a função específica (Admin, User, etc.)
        if (Auth::check() && Auth::user()->hasOne($role)) {
            return $next($request);
        }

        // Caso contrário, redirecione ou retorne uma resposta proibida (403)
        // Exemplo de redirecionamento para a página inicial:
        // return redirect('/home');

        // Exemplo de resposta proibida (403):
        abort(403, 'Acesso não autorizado');
    }
}
