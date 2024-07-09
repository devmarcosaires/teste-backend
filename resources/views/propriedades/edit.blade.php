@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Propriedade</h1>
    <form action="{{ route('propriedades.update', $propriedade->idPropriedade) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="idProdutor">Produtor</label>
            <select class="form-control" id="idProdutor" name="idProdutor" required>
                @foreach ($produtores as $produtor)
                    <option value="{{ $produtor->idProdutor }}" {{ $propriedade->vinculo && $propriedade->vinculo->idProdutor == $produtor->idProdutor ? 'selected' : '' }}>
                        {{ $produtor->nomeProdutor }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nomePropriedade">Nome da Propriedade</label>
            <input type="text" class="form-control" id="nomePropriedade" name="nomePropriedade" value="{{ $propriedade->nomePropriedade }}" required>
        </div>
        <div class="form-group">
            <label for="numeroCar">Cadastro Rural</label>
            <input type="text" class="form-control" id="numeroCar" name="numeroCar" value="{{ $propriedade->numeroCar }}" required>
        </div>
        <div class="form-group">
            <label for="uf">UF</label>
            <input type="text" class="form-control" id="uf" name="uf" value="{{ $propriedade->uf }}" required>
        </div>
        <div class="form-group">
            <label for="municipio">Município</label>
            <input type="text" class="form-control" id="municipio" name="municipio" value="{{ $propriedade->municipio }}" required>
        </div>
        <div class="form-group">
            <label for="pais">País</label>
            <input type="text" class="form-control" id="pais" name="pais" value="{{ $propriedade->pais }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $propriedade->status ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ !$propriedade->status ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="liberado">Liberado</label>
            <select class="form-control" id="liberado" name="liberado" required>
                <option value="1" {{ $propriedade->liberado ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ !$propriedade->liberado ? 'selected' : '' }}>Não</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
