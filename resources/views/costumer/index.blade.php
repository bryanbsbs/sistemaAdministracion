@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a href="{{ route('costumers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
										<th>Razon social</th>
										<th>Persona</th>
										<th>RFC</th>
										<th>Domicilio</th>
										<th>Email</th>
										<th>Telefono</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($costumers as $costumer)
                                        <tr>
                                            <td>{{ $costumer->id }}</td>
											<td>{{ $costumer->razonSocial }}</td>
											<td>{{ $costumer->persona }}</td>
											<td>{{ $costumer->rfc }}</td>
											<td>{{ $costumer->domicilio }}</td>
											<td>{{ $costumer->email }}</td>
											<td>{{ $costumer->telefono }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('costumers.show',$costumer->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('costumers.edit',$costumer->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $costumers->links() !!}
            </div>
        </div>
    </div>
@endsection
