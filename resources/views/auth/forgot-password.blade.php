<x-guest-layout>
    @section('title')
        {{ 'Recover your password' }}
    @endsection
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Tio</b>Educação</a>
            </div>
            <div class="card-body">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <p class="login-box-msg">Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e nós
                    enviaremos por e-mail um link de redefinição de senha que permitirá que você escolha uma nova.</p>
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required autofocus placeholder="Enter email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="text-danger" />
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Link de redefinição de senha de e-mail</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</x-guest-layout>
