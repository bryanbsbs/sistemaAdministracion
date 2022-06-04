@extends('adminlte::page')

@section('title')
    {{ $person->razonSocial ?? 'Detalles' }}
@stop

@section('content_header')
    <h1>{{ $person->razonSocial ?? 'Detalles' }}</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('persons.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Razón social:</strong>
                            {{ $person->razonSocial }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $person->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Persona:</strong>
                            {{ $person->persona }}
                        </div>
                        <div class="form-group">
                            <strong>RFC:</strong>
                            {{ $person->rfc }}
                        </div>
                        <div class="form-group">
                            <strong>Domicilio:</strong>
                            {{ $person->domicilio }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $person->email }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $person->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
