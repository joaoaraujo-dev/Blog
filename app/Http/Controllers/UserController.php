<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::paginate(10);

        return view("admin.users", compact("users"));
    }

    public function create()
    {}

    public function store(Request $request): RedirectResponse
    {
        $createUser = $request->all();
        $createUser["password"] = bcrypt($request->password);

        if ($request->password == $request->confirm_password) {
           $user = User::create($createUser);
        } else {
           return back()->with("passError", "As senhas não são iguais");
        }

        Auth::login($user); 

        return redirect()->route("admin.dashboard");
    }

    public function show(string $id)
    {}

    public function edit(string $id)
    {}

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            "name" => 'required',
            "email" => 'required|email'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->back()->with("success", "Usuario editado com sucesso!");
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with("success", "Usuario deletado com sucesso!!");
    }
}
