<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminUserMiddleware
{
    /**
     * Gère une demande entrante.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Récupère l'utilisateur authentifié
        $user = Auth::user();

        // Vérifie si aucun utilisateur n'est authentifié
        if (!$user) {
            // Redirige vers la page de connexion
            return redirect()->route('login');
            // Ou bien: return redirect('/login');
        }

        // Vérifie si l'utilisateur authentifié n'a pas le rôle d'administrateur
        if ($user['role'] != User::ADMIN_ROLE) {
            // Redirige vers la page de connexion
            return redirect()->route('login');
        }

        // Passe la demande au middleware suivant dans la chaîne
        return $next($request);
    }
}
