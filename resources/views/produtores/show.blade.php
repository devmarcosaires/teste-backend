<!-- resources/views/produtores/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Produtor</h1>
        
        <p><strong>Registro Individual:</strong> {{ $produtor->registroIndividual }}</p>
        <p><strong>Nome do Produtor:</strong> {{ $produtor->nomeProdutor }}</p>
        <p><strong>Status:</strong> {{ $produtor->status ? 'Ativo' : 'Inativo' }}</p>

        <a href="{{ route('produtores.index') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection
