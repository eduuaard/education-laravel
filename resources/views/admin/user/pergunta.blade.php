<x-admin>
    <div class="register-box container" style="margin-top:4%; width:55%">
        <div class="card">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Registrar</a>
            </div>
            <div class="card-body mx-auto" style="width: 100%">
                <p class="login-box-msg">Registre uma pergunta</p>

                <!-- Route leva para o arquivo routes/admin.php para a rota store -->
                <form action="{{ route('admin.pergunta.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="pergunta" class="form-control" type="text" name="pergunta" :value="old('name')"
                            required autofocus autocomplete="name" placeholder="Escreva a pergunta">
                        <x-input-error :messages="$errors->get('name')" class="text-danger" />
                    </div>

                    <div class="input-group mb-3">
                        <select class="form-control" name="peso" id="peso" required>
                            <option value="Selecione o nível">Selecione o peso</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <x-input-error :messages="$errors->get('password')" class="text-danger" />
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-md-6 mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</x-admin>
