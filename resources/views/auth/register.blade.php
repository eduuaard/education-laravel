<x-guest-layout>
    @section('title')
        {{ 'Register' }}
    @endsection
    <div class="register-box container" style="margin-top:-4%; width:55%">
        <div class="card">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Registrar</a>
            </div>
            <div class="card-body mx-auto" style="width: 100%">
                <p class="login-box-msg">Registre o novo usuário</p>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="name" class="form-control" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" placeholder="Digite o nome...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="text-danger" />
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required autocomplete="username" placeholder="Digite o e-mail...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="text-danger" />
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" class="form-control" type="password" name="password" required
                            autocomplete="new-password" placeholder="Digite a senha...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="text-danger" />
                    </div>
                    <div class="input-group mb-3">
                        <input id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirme a senha...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger" />
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control" name="nivel" id="nivel" required>
                            <option value="Selecione o nível">Selecione o nível</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="text-danger" />
                    </div>
                    <div class="input-group mb-3">
                        <input id="unidade" class="form-control" type="text" name="unidade" :value="old('unidade')"
                            required autofocus autocomplete="unidade" placeholder="Digite a unidade...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="text-danger" />
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control" name="status" id="status" required>
                            <option value="Selecione o status">Selecione o status</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
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
</x-guest-layout>
