@extends('layouts.app')

@section('template_title')
    {{ $pay->name ?? 'Show Pay' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pay</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pays.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Provider Id:</strong>
                            {{ $pay->provider_id }}
                        </div>
                        <div class="form-group">
                            <strong>Project Id:</strong>
                            {{ $pay->project_id }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $pay->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $pay->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Metodo:</strong>
                            {{ $pay->metodo }}
                        </div>
                        <div class="form-group">
                            <strong>Referencia:</strong>
                            {{ $pay->referencia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
