<?php

namespace App\Http\Controllers;

use App\Models\UnidadeEnsino;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::orderBy('id', 'DESC')->get();
        return view('admin.user.index', compact('data'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $unidades = UnidadeEnsino::pluck('name', 'id');
        return view('admin.user.user-edit', compact('user', 'unidades'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'nova_senha' => 'nullable|string|min:8|confirmed',
            'nivel' => 'required|in:0,1',
            'unidade' => 'required|exists:users,unidade', // Assumindo que o nome da unidade é único
            'status' => 'required|in:Ativo,Inativo',
        ]);

        // Atualizar os dados do usuário
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nivel' => $request->nivel,
            'unidade' => $request->unidade,
            'status' => $request->status,
        ]);

        // Se uma nova senha foi fornecida, atualizar a senha
        if ($request->filled('nova_senha')) {
            $user->update([
                'password' => Hash::make($request->nova_senha),
            ]);
        }

        return redirect()->route('admin.user.index')->with('success', 'Usuário atualizado com sucesso!');
    }


    public function destroy($id)
    {

        $user = User::findOrFail($id);

        // Remover o usuário
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'Usuário removido com sucesso!');
    }
}
