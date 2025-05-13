<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SaldoBajo;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;


class VerificarSaldoBajo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->saldo < 50) {
            $cacheKey = 'saldo_bajo_notificado_' . $user->id;

            if (!Cache::has($cacheKey)) {
                $user->notify(new SaldoBajo($user->saldo));

                // Guardamos en caché por 24 horas
                Cache::put($cacheKey, true, now()->addDay());
            }
        }

        return $next($request);
    }
}
