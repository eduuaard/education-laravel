<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadeEnsino;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;

class UnidadeListController extends Controller
{
    public function index()
    {
        $data = UnidadeEnsino::orderBy('id','DESC')->get();
        return view('admin.user.unidade-list', compact('data'));
    }

    public function edit($id)
    {
        $unidades = UnidadeEnsino::findOrFail($id);
        return view('admin.user.unidade-edit', compact('unidades'));
    }

    public function update(Request $request, $id): RedirectResponse

    {
        $unidades = UnidadeEnsino::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $unidades->update([
            'name' => $request->name,
        ]);

        return redirect()->intended(RouteServiceProvider::UNIDADE)->with('success', 'Unidade atualizada com sucesso!');
    }

    public function destroy($id)
    {

        $unidades = UnidadeEnsino::findOrFail($id);

        // Remover o usuário
        $unidades->delete();

        return redirect()->intended(RouteServiceProvider::UNIDADE)->with('success', 'Unidade removida com sucesso!');
    }

}
