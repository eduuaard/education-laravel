<x-admin>
    @section('title')
        {{ 'Visão geral' }}
    @endsection

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                @if ($nivelUsuario == 0)
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalUnidades }}</h3>
                                <p>Unidade de Ensino</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $mediaPontuacao }}<sup style="font-size: 20px">%</sup></h3>
                            <p>Nível Médio</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>

                @if ($nivelUsuario == 0)
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $totalAlunos }}</h3>
                                <p>Quantidade de Alunos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalPerguntas }} - @if($mediaPontuacao) {{ $totalPontosPerguntas }} @endif </h3>
                            <p>Total de perguntas e pontos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-admin>
