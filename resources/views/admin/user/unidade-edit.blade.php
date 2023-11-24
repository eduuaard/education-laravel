<x-admin>

    <div class="register-box container" style="margin-top:4%; width:55%">
        <div class="card">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Editar unidade</a>
            </div>

            <div class="card-body mx-auto" style="width: 100%">
                <p class="login-box-msg">Editar Unidade</p>

                <!-- Route leva para o arquivo routes/admin.php para a rota store -->
                <form action="{{ route('admin.unidade.update', $unidades->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="input-group mb-3">
                        <input id="name" class="form-control" type="text" name="name" value="{{ $unidades->name }}""
                            required>
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