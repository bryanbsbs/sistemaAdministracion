@extends('adminlte::page')

@section('title', 'Crear pago')

@section('content_header')
    <h1>Crear pago</h1>
@stop


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('transactions.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('transaction.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
