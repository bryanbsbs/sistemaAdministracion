@extends('adminlte::page')

@section('title', 'Detalle del pago')

@section('content_header')
    <h1>Detalle del pago</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('transactions.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Person id:</strong>
                            {{ $transaction->provider_id }}
                        </div>
                        <div class="form-group">
                            <strong>Project id:</strong>
                            {{ $transaction->project_id }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $transaction->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $transaction->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Metodo:</strong>
                            {{ $transaction->metodo }}
                        </div>
                        <div class="form-group">
                            <strong>Referencia:</strong>
                            {{ $transaction->referencia }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
