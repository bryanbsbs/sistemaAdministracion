@extends('adminlte::page')

@section('title', 'Editar proyecto')

@section('content_header')
    <h1>Editar proyecto</h1>
@stop

@section('content')
    @include('fragments.validation-errors')
    @include('fragments.sesion')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.update', $project->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('project.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
