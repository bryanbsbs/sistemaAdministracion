@extends('layouts.app')

@section('template_title')
    {{ $provider->name ?? 'Show Provider' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Provider</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('providers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Razonsocial:</strong>
                            {{ $provider->razonSocial }}
                        </div>
                        <div class="form-group">
                            <strong>Persona:</strong>
                            {{ $provider->persona }}
                        </div>
                        <div class="form-group">
                            <strong>Rfc:</strong>
                            {{ $provider->rfc }}
                        </div>
                        <div class="form-group">
                            <strong>Domicilio:</strong>
                            {{ $provider->domicilio }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $provider->email }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $provider->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
