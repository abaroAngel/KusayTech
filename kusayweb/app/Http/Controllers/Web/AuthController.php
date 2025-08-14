<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Solo Admin activo
            if (!auth()->user()->hasRole('Admin') || !auth()->user()->is_active) {
                Auth::logout();
                return back()->withErrors(['email' => 'No autorizado o usuario inactivo.'])
                             ->onlyInput('email');
            }

            return redirect()->intended(route('panel'));
        }

        return back()->withErrors(['email' => 'Credenciales inválidas.'])
                     ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
