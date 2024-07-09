@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Novo Produtor</h1>

        <form action="{{ route('produtores.store') }}" method="POST" class="mx-auto" style="max-width: 600px;">
            @csrf
            <div class="form-group">
                <label for="registroIndividual" style="font-size: 0.9em;">CPF</label>
                <input type="text" class="form-control" id="registroIndividual" name="registroIndividual" required>
            </div>
            <div class="form-group">
                <label for="nomeProdutor" style="font-size: 0.9em;">Nome do Produtor</label>
                <input type="text" class="form-control" id="nomeProdutor" name="nomeProdutor" required>
            </div>
            <div class="form-group">
                <label for="status" style="font-size: 0.9em;">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Salvar</button>
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
