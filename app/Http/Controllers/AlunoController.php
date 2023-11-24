<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Pergunta;
use App\Models\Resposta;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostrarPerguntas()
    {
        $perguntas = Pergunta::all();
        return view('admin.user.aluno', compact('perguntas'));
    }

    public function salvarRespostas(Request $request)
    {
        $userId = auth()->user()->id;
        $dadosRespostas = $request->input('respostas', []);

        // Obtém todas as perguntas
        $todasPerguntas = Pergunta::pluck('id')->toArray();

        foreach ($todasPerguntas as $perguntaId) {
            $selecionada = isset($dadosRespostas[$perguntaId]['selecionada']) ? 1 : 0;

            Resposta::updateOrCreate(
                ['user_id' => $userId, 'pergunta_id' => $perguntaId],
                ['selecionada' => $selecionada]
            );
        }
 
        return redirect()->route('admin.dashboard')->with('success', 'Respostas salvas com sucesso!');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Aluno $aluno)
    {
        //
    }

    public function edit(Aluno $aluno)
    {
        //
    }

    public function update(Request $request, Aluno $aluno)
    {
        //
    }

    public function destroy(Aluno $aluno)
    {
        //
    }
}