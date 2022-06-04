@extends('adminlte::page')

@section('title', 'Pagos y anticipos')

@section('content_header')
    <h1>Pagos y anticipos</h1>
@stop

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">

                        <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                            {{ __('Registrar pago') }}
                        </a>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
										<th>Monto</th>
										<th>Fecha</th>
										<th>Metodo</th>
										<th>Razón social</th>
										<th>Tipo</th>
										<th>Nombre del proyecto</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($temporalTable as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->monto }}</td>
                                            <td>{{ $row->fecha }}</td>
                                            <td>{{ $row->metodo }}</td>
                                            <td>{{ $row->razonSocial }}</td>
                                            <td>{{ $row->tipo }}</td>
                                            <td>{{ $row->nombre }}</td>
                                            <td>
                                                <form action="{{ route('transactions.destroy',$row->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('transactions.show',$row->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('transactions.edit',$row->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
