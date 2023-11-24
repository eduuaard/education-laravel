<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.pergunta');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pergunta' => 'required|string|max:255',
            'peso' => 'required|in:0,1,2,3,4,5,6,7,8,9,10',
        ]);

        $pergunta = new Pergunta([
            'pergunta' => $request->pergunta,
            'peso' => $request->peso,
        ]);

        $pergunta->save();

        return redirect()->intended(RouteServiceProvider::PERGUNTA)->with('success', 'Pergunta cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pergunta $pergunta)
    {
        //
    }

    public function edit($id)
    {
        $perguntas = Pergunta::findOrFail($id);
        return view('admin.user.pergunta-edit', compact('perguntas'));
    }

    public function update(Request $request, $id)
    {
        $perguntas = Pergunta::findOrFail($id);

        $request->validate([
            'pergunta' => 'required|string|max:255',
            'peso' => 'required|in:0,1,2,3,4,5,6,7,8,9,10',
        ]);

        $perguntas->update([
            'pergunta' => $request->pergunta,
            'peso' => $request->peso,
        ]);

        return redirect()->intended(RouteServiceProvider::PERGUNTA)->with('success', 'Pergunta atualizada com sucesso');
    }

    public function destroy($id)
    {
        $perguntas = Pergunta::findOrFail($id);

        // Remover o usuário
        $perguntas->delete();

        return redirect()->intended(RouteServiceProvider::PERGUNTA)->with('success', 'Pergunta removida com sucesso!');
    }
}
