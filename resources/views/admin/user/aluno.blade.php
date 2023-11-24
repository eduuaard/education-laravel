<x-admin>

    @section('title')
        {{ 'Perguntas' }}
    @endsection

    
    <div class="card container">
        <div class="card-body">
            <h2 class="mb-3">Responder Perguntas</h2>
            <hr>
            <form action="{{ route('admin.aluno.salvar') }}" method="POST">
                @csrf

                @foreach ($perguntas as $pergunta)
                    <div class="mb-3">
                        <label>{{ $pergunta->pergunta }}</label>
                        <div>
                            <input type="checkbox" id="resposta_{{ $pergunta->id }}"
                                name="respostas[{{ $pergunta->id }}][selecionada]">
                            <label for="resposta_{{ $pergunta->id }}">Marcar como resposta</label>
                            <hr>
                        </div>
                    </div>
                @endforeach


                <button type="submit" class="btn btn-primary">Enviar Respostas</button>
            </form>
        </div>

</x-admin>
