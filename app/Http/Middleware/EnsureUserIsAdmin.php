<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah user sudah login
        // 2. Cek apakah kolom/properti 'role' pada user bernilai 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Jika BUKAN admin, lemparkan error 403 (Forbidden)
        abort(403, 'Anda tidak memiliki hak akses ke halaman ini.');

        // ATAU Anda bisa mengalihkan (redirect) ke halaman lain, misalnya:
        // return redirect()->route('home')->with('error', 'Akses ditolak.');
    }
}
