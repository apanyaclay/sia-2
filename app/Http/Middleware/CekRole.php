<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (Auth::check()) {
            $userrole = Auth::user()->role;
            if (in_array($userrole, $roles)) {
                return $next($request);
            } else {
                switch ($userrole) {
                    case 'Super Admin':
                        return redirect()->route('superadmin');
                    case 'Admin':
                        return redirect()->route('admin');
                    case 'Guru':
                        return redirect()->route('guru');
                    case 'Siswa':
                        return redirect()->route('siswa');
                }
            }
        }
    }
}
