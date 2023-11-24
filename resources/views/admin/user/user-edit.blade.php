<x-admin>

    @section('title')
        {{ 'Editar' }}
    @endsection

    <div class="card container">
        <div class="card-body">
            <h2 class="mb-3">Editar Usuário</h2>
            <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="">Nome</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}"
                        required>
                    <x-input-error :messages="$errors->get('name')" class="text-danger" />
                </div>


                <div class="mb-3">
                    <label for="name" class="">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ $user->email }}"
                        required>
                    <x-input-error :messages="$errors->get('email')" class="text-danger" />
                </div>

                <div class="mb-3">
                    <label for="nova_senha" class="">Nova senha</label>
                    <input id="nova_senha" class="form-control" type="password" name="senha_atual" required>
                    <x-input-error :messages="$errors->get('senha_atual')" class="text-danger" />
                </div>

                <div class="mb-3">
                    <label for="confirme_senha" class="">Confirme a nova senha</label>
                    <input id="confirme_senha" class="form-control" type="password" name="confirme_senha" required>
                    <x-input-error :messages="$errors->get('confirme_senha')" class="text-danger" />
                </div>

                <div class="mb-3">
                    <label for="nivel">Selecione o nivel</label>
                    <select class="form-control" name="nivel" id="nivel" required>
                        <option value="Selecione o nível">Selecione o nível</option>
                        <option value="0" {{ $user->nivel == '0' ? 'selected' : '' }}>0</option>
                        <option value="1" {{ $user->nivel == '1' ? 'selected' : '' }}>1</option>
                    </select>
                    <x-input-error :messages="$errors->get('nivel')" class="text-danger" />
                </div>

                <div class="mb-3">
                    <label for="unidade">Selecione a unidade</label>
                    <select class="form-control" name="unidade" id="unidade" required>
                        <option value="Selecione a unidade">Selecione a unidade</option>
                        @foreach ($unidades as $id => $name)
                            <option value="{{ $name }}" {{ $user->unidade == $name ? 'selected' : '' }}>
                                {{ $name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('unidade')" class="text-danger" />
                </div>

                <div class="mb-3">
                    <label for="status">Selecione o status</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="Selecione o status">Selecione o status</option>
                        <option value="Ativo" {{ $user->status == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                        <option value="Inativo" {{ $user->status == 'Inativo' ? 'selected' : '' }}>Inativo</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="text-danger" />
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>


</x-admin>
