<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view("usuarios.usuarios_index", ["usuarios" => User::all()]);
    }

    public function create()
    {
        return view("usuarios.usuarios_create");
    }

    public function store(Request $request)
    {
        $usuario = new User($request->input());
        $usuario->password = Hash::make($usuario->password);
        $usuario->saveOrFail();
        return redirect()->route("usuarios.index")->with("mensaje", "Usuario guardado");
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        $user->password = "";
        return view("usuarios.usuarios_edit", ["usuario" => $user,
        ]);
    }


    public function update(Request $request, User $user)
    {
        $user->fill($request->input());
        $user->password = Hash::make($user->password);
        $user->saveOrFail();
        return redirect()->route("usuarios.index")->with("mensaje", "Usuario actualizado");
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("usuarios.index")->with("mensaje", "Usuario eliminado");
    }
}
