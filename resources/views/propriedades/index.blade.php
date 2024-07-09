@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Propriedades</h1>

    <!-- Formulário de busca -->
    <form action="{{ route('propriedades.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar propriedades..." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <div class="mb-3">
        <a href="{{ route('propriedades.create') }}" class="btn btn-primary">Nova Propriedade</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Produtor</th>
                <th>UF</th>
                <th>Município</th>
                <th>País</th>
                <th>Status</th>
                <th>Liberado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propriedades as $propriedade)
            <tr>
            <td>{{ $propriedade->nomePropriedade }}</td>
    <td>
        @if ($propriedade->vinculo && $propriedade->vinculo->produtor)
            {{ $propriedade->vinculo->produtor->nomeProdutor }}
        @else
            Produtor não encontrado
        @endif
    </td>
                <td>{{ $propriedade->uf }}</td>
                <td>{{ $propriedade->municipio }}</td>
                <td>{{ $propriedade->pais }}</td>
                <td>
                    @if ($propriedade->status)
                        Ativo
                    @else
                        Inativo
                    @endif
                </td>
                <td>
                    @if ($propriedade->liberado)
                        Sim
                    @else
                        Não
                    @endif
                </td>
                <td>

                    <a href="{{ route('propriedades.show', $propriedade->idPropriedade) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('propriedades.edit', $propriedade->idPropriedade) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('propriedades.destroy', $propriedade->idPropriedade) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
