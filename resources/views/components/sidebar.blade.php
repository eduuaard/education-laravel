<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Início
                </p>
            </a>
        </li>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{-- Aqui testar se o nivel do Usuário é igual a 0 --}}
                @if ($nivelUsuario == 0)
                    <li class="nav-item">
                        <a href="{{ route('admin.list.index') }}"
                            class="nav-link {{ Route::is('admin.list.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Unidades de Ensino
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}"
                            class="nav-link {{ Route::is('admin.user.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Usuários/Alunos
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.lista_pergunta.index') }}"
                            class="nav-link {{ Route::is('admin.lista_pergunta.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-question"></i>
                            <p>
                                Perguntas do Dianóstico
                            </p>
                        </a>
                    </li>
                @endif
                {{-- Final do teste --}}

                <li class="nav-item">
                    <a href="{{ route('admin.aluno.index') }}"
                        class="nav-link {{ Route::is('admin.pergunta.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-check"></i>
                        <p>
                            Diagnóstico
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </ul>
</nav>
