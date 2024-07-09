@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Propriedade</h1>
    <div class="card">
        <div class="card-header">
            Propriedade #{{ $propriedade->id }}
        </div>
        <div class="card-body">
            <p><strong>Produtor:</strong> {{ $propriedade->produtor->nomeProdutor }}</p>
            <p><strong>Nome:</strong> {{ $propriedade->nomePropriedade }}</p>
            <p><strong>Cadastro Rural:</strong> {{ $propriedade->numeroCar }}</p>
            <p><strong>UF:</strong> {{ $propriedade->uf }}</p>
            <p><strong>Município:</strong> {{ $propriedade->municipio }}</p>
            <p><strong>País:</strong> {{ $propriedade->pais }}</p>
            <p><strong>Status:</strong> {{ $propriedade->status ? 'Ativo' : 'Inativo' }}</p>
            <p><strong>Liberado:</strong> {{ $propriedade->liberado ? 'Sim' : 'Não' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('propriedades.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection
