@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1>Pagos</h1>
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
                            {{ __('Crear nuevo') }}
                        </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
										<th>Person</th>
										<th>Project</th>
										<th>Monto</th>
										<th>Fecha</th>
										<th>Metodo</th>
										<th>Referencia</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
											<td>{{ $transaction->person_id }}</td>
											<td>{{ $transaction->project_id }}</td>
											<td>{{ $transaction->monto }}</td>
											<td>{{ $transaction->fecha }}</td>
											<td>{{ $transaction->metodo }}</td>
											<td>{{ $transaction->referencia }}</td>
                                            <td>
                                                <form action="{{ route('transactions.destroy',$transaction->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('transactions.show',$transaction->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('transactions.edit',$transaction->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
