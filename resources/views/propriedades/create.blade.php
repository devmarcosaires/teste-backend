@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container" style="max-width: 600px;">
        <h1>Nova Propriedade</h1>
        <form action="{{ route('propriedades.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="idProdutor">Produtor</label>
        <select class="form-control" id="idProdutor" name="idProdutor" required>
            @foreach ($produtores as $produtor)
                <option value="{{ $produtor->idProdutor }}">{{ $produtor->nomeProdutor }}</option>
            @endforeach
        </select>
    </div>
            <div class="form-group">
                <label for="nomePropriedade">Nome da Propriedade</label>
                <input type="text" class="form-control" id="nomePropriedade" name="nomePropriedade" required>
            </div>
            <div class="form-group">
                <label for="numeroCar">Cadastro Rural</label>
                <input type="text" class="form-control" id="numeroCar" name="numeroCar" required>
            </div>
            <div class="form-group">
                <label for="uf">UF</label>
                <input type="text" class="form-control" id="uf" name="uf" required>
            </div>
            <div class="form-group">
                <label for="municipio">Município</label>
                <input type="text" class="form-control" id="municipio" name="municipio" required>
            </div>
            <div class="form-group">
                <label for="pais">País</label>
                <input type="text" class="form-control" id="pais" name="pais" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="liberado">Liberado</label>
                <select class="form-control" id="liberado" name="liberado" required>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection
