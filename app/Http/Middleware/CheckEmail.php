<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pekerja;

class CheckEmail
{
    public function handle(Request $request, Closure $next)
    {
        $email = $request->input('email');

        // Cek apakah email terdaftar di tabel pekerjas
        if (!Pekerja::where('email', $email)->exists()) {
            return redirect()->back()
                ->withErrors(['email' => 'Email ini tidak terdaftar sebagai pekerja.'])
                ->withInput();
        }

        return $next($request);
    }
}
