@extends('layout')
@section('content')

    <section class="content">
        <div class="container">
            <form class="" method="POST" action="{{ route('faleMais.resultado') }}">
                @csrf
                <div class="form-group col-md-3">
                    <label for="cidadeOrigem">Cidade Origem</label>
                    <select id="cidadeOrigem" name="cidadeOrigem" class="form-control" required>
                        <option value="">Selecione..</option>
                        @foreach($cidades as $key => $cidade)
                            <option value="{{$key}}" {{ old('cidadeOrigem') == $key ? 'selected="selected"' : '' }}>{{$cidade}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="cidadeDestino">Cidade Destino</label>
                    <select id="cidadeDestino" name="cidadeDestino" class="form-control" required>
                        <option value="">Selecione..</option>
                        @foreach($cidades as $key => $cidade)
                            <option value="{{$key}}" {{ old('cidadeDestino') == $key ? 'selected="selected"' : '' }}>{{$cidade}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="minutosLigacao">Tempo de Ligação <small>(em minutos)</small></label>
                    <input type="number" id="minutosLigacao" name="minutosLigacao" class="form-control" min="1" value="{{ old('minutosLigacao') }}"/>
                </div>

                <div class="form-group col-md-3">
                    <label for="pacoteUtilizado">Pacote Utilizado</label>
                    <select id="pacoteUtilizado" name="pacoteUtilizado" class="form-control">
                        @foreach($pacotes as $key => $pacote)
                            <option value="{{$key}}" {{ old('pacoteUtilizado') == $key ? 'selected="selected"' : '' }}>{{$pacote}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 text-center">
                    @error('cidadeOrigem')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('cidadeDestino')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('minutosLigacao')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('pacoteUtilizado')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" id="btnCalcular" class="btn btn-success">Calcular</div>
                </div>
            </form>
        </div>
    </section>

@endsection