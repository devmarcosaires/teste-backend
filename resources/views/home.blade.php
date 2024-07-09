@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Informações do Usuário') }}</div>
                <div class="card-body">
                    <p><strong>Nome:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Cargo:</strong> {{ Auth::user()->descricaoCargo }}</p>
                    <p><strong>Industria:</strong> {{ Auth::user()->industria }}</p>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">{{ __('Clientes') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('produtores.index') }}" class="btn btn-primary btn-block">Produtores</a>
                        <a href="{{ route('propriedades.index') }}" class="btn btn-secondary btn-block">Propriedades</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
