<x-admin>
    @section('title')
        {{'Lista de perguntas'}}
    @endsection
    <div class="container">
        <div class="row">
            <div class="col-sm-4" style="margin-left:-7px">
                <a href="{{ route('admin.pergunta.index') }}" class="btn btn-success  ">Nova pergunta</a>
            </div>
        </div>
    </div>

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Perguntas</th>
                        <th>Peso</th>
                        <th>Data de registro de perguntas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $pergunta )
                        <tr>
                            <td>{{ $pergunta->id }}</td>
                            <td>{{ $pergunta->pergunta }}</td>
                            <td>{{ $pergunta->peso }}</td>
                            <td>{{ $pergunta->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.pergunta.edit', $pergunta->id) }}" class="btn btn-primary">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.pergunta.destroy', $pergunta->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


    <script>
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                var userId = this.getAttribute('data-user-id');

                var confirmDelete = confirm('Tem certeza que deseja excluir?');

                if (confirmDelete) {
                    document.getElementById('deleteForm' + userId).submit();
                }
            });
        });
    </script>
</x-admin>
