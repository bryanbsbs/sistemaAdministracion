@extends('layouts.app')

@section('template_title')
    {{ $advance->name ?? 'Show Advance' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Advance</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('advances.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Costumer Id:</strong>
                            {{ $advance->costumer_id }}
                        </div>
                        <div class="form-group">
                            <strong>Project Id:</strong>
                            {{ $advance->project_id }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $advance->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $advance->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Metodo:</strong>
                            {{ $advance->metodo }}
                        </div>
                        <div class="form-group">
                            <strong>Referencia:</strong>
                            {{ $advance->referencia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
