@extends('adminlte::page')

@section('title', 'Crear proveedor')

@section('content_header')
    <h1>Crear proveedor</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('providers.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('provider.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
