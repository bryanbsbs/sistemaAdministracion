@extends('layouts.app')

@section('template_title')
    {{ $project->name ?? 'Show Project' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Project</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $project->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fechainicio:</strong>
                            {{ $project->fechaInicio }}
                        </div>
                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $project->subtotal }}
                        </div>
                        <div class="form-group">
                            <strong>Iva:</strong>
                            {{ $project->iva }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $project->total }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto:</strong>
                            {{ $project->concepto }}
                        </div>
                        <div class="form-group">
                            <strong>Comentariosadicionales:</strong>
                            {{ $project->comentariosAdicionales }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
