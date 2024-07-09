@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Editar Produtor</h1>

        <form action="{{ route('produtores.update', $produtor->idProdutor) }}" method="POST" class="mx-auto" style="max-width: 600px;">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="registroIndividual" style="font-size: 0.9em;">Registro Individual</label>
                <input type="text" class="form-control" id="registroIndividual" name="registroIndividual" value="{{ $produtor->registroIndividual }}" required>
            </div>
            <div class="form-group">
                <label for="nomeProdutor" style="font-size: 0.9em;">Nome do Produtor</label>
                <input type="text" class="form-control" id="nomeProdutor" name="nomeProdutor" value="{{ $produtor->nomeProdutor }}" required>
            </div>
            <div class="form-group">
                <label for="status" style="font-size: 0.9em;">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ $produtor->status == 1 ? 'selected' : '' }}>Ativo</option>
                    <option value="0" {{ $produtor->status == 0 ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <a href="{{ route('produtores.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#registroIndividual').mask('000.000.000-00', {reverse: true});
        });
    </script>
@endsection
