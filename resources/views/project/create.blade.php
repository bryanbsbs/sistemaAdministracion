@extends('adminlte::page')

@section('title', 'Crear proyecto')

@section('content_header')
    <h1>Crear proyecto</h1>
@stop

@section('content')
    @include('fragments.validation-errors')
    @include('fragments.sesion')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('project.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
