@extends('layouts.app')

@section('template_title')
    {{ $costumer->name ?? 'Show Costumer' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Costumer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('costumers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Razonsocial:</strong>
                            {{ $costumer->razonSocial }}
                        </div>
                        <div class="form-group">
                            <strong>Persona:</strong>
                            {{ $costumer->persona }}
                        </div>
                        <div class="form-group">
                            <strong>Rfc:</strong>
                            {{ $costumer->rfc }}
                        </div>
                        <div class="form-group">
                            <strong>Domicilio:</strong>
                            {{ $costumer->domicilio }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $costumer->email }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $costumer->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
