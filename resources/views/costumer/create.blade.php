@extends('adminlte::page')

@section('title', 'Crear cliente')

@section('content_header')
    <h1>Crear cliente</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('costumers.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('costumer.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
