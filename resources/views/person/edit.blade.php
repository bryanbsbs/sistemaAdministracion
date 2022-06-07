@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar</h1>
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
                        <form method="POST" action="{{ route('persons.update', $person->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('person.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
