<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    public function auth(Request $request): RedirectResponse {
        $credentials = $request->validate([
           "email" => ["required", "email"],
           "password" => ["required"]
        ], [
            "email.required" => "Email e obrigatório",
            "password.required" => "Senha e obrigatório",
            "email" => "Email inválido"
        ]);

        if (Auth::attempt($credentials, $request->remember)) { // "Auth::attempt" faz a verificação das credenciais no banco de dados
            $request->session()->regenerate();

            if (Gate::allows("isAdmin")) { // se retornar verdadeiro ele redireciona para 'admin/dashboard'
               return redirect()->intended("/admin/dashboard");
            } else {
               return redirect()->intended("/");
            }

        } else {
            return redirect()->back()->with("failedLogin", "Usuario ou senha invalidos");
        }
    }

    public function logout(Request $request): RedirectResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("home");
    }
}
