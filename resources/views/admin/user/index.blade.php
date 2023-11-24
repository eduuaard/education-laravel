<x-admin>
    @section('title')
        {{ 'Usuários' }}
    @endsection
    <div class="container">
        <div class="row">
            <div class="col-sm-4" style="margin-left:-7px">
                <a href="{{ route('admin.register.create') }}" class="btn btn-success  ">Novo usuário</a>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Nível</th>
                    <th>Unidade</th>
                    <th>Status</th>
                    <th>Criação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nivel }}</td>
                        <td>{{ $user->unidade }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
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
