@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Produtores</h1>
        
        <form action="{{ route('produtores.index') }}" method="GET" class="mb-3">
            <label for="search" class="form-label">Buscar por nome:</label>
            <div class="input-group">
                <input type="text" id="search" name="search" class="form-control" placeholder="Digite o nome..." value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </div>
        </form>

        <a href="{{ route('produtores.create') }}" class="btn btn-primary mb-3">Novo Produtor</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Registro Individual</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produtores as $produtor)
                        <tr>
                       
                        <td>{{ $produtor->nomeProdutor }}</td>
                        <td>{{ $produtor->registroIndividual }}</td>
                        <td>{{ $produtor->status ? 'Ativo' : 'Inativo' }}</td>
                        <td>
                            <a href="{{ route('produtores.show', $produtor->idProdutor) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('produtores.edit', $produtor->idProdutor) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('produtores.destroy', $produtor->idProdutor) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja deletar este produtor?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nenhum produtor encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $produtores->links() }} {{-- Paginação --}}
    </div>
@endsection
