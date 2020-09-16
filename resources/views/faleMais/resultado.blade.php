@extends('layout')
@section('content')

    <section class="content">
        <div class="container">
            <div class="col-md-12" style="overflow-x: auto;"> 
                <table id="table-resultado-fale-mais">
                    <thead>
                        <tr>
                            <td>Origem</td>
                            <td>Destino</td>
                            <td>Tempo</td>
                            @if($objetoCalculo->pacoteUtilizado == "Sem Pacote")
                                <td>Valor Sem FaleMais</td>
                            @else
                                <td>Plano FaleMais</td>
                                <td>Com FaleMais</td>
                                <td>Sem FaleMais</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $objetoCalculo->cidadeOrigem }}</td>
                            <td>{{ $objetoCalculo->cidadeDestino }}</td>
                            <td>{{ $objetoCalculo->minutosLigacao }} minutos</td>
                            @if($objetoCalculo->pacoteUtilizado == "Sem Pacote")
                                <td>{{ $objetoCalculo->precoSemPacote }}</td>
                            @else
                                <td>{{ $objetoCalculo->pacoteUtilizado }}</td>
                                <td>{{ $objetoCalculo->precoComPacote }}</td>
                                <td>{{ $objetoCalculo->precoSemPacote }}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 text-center">
                <a href="{{ route('faleMais.consulta') }}"><button class="btn btn-primary">Nova Consulta</button></a>
            </div>
        </div>
    </section>

@endsection