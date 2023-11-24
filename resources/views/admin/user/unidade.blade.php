<x-admin>
    <div class="register-box container" style="margin-top:4%; width:55%">
        <div class="card">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Registrar</a>
            </div>
            <div class="card-body mx-auto" style="width: 100%">
                <p class="login-box-msg">Registre a nova unidade</p>

                <!-- Route leva para o arquivo routes/admin.php para a rota store -->
                <form action="{{ route('admin.unidade.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="name" class="form-control" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" placeholder="Digite o nome da nova unidade...">
                        <x-input-error :messages="$errors->get('name')" class="text-danger" />
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
