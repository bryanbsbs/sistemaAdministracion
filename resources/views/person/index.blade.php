@extends('adminlte::page')

@section('title', 'Personas')

@section('content_header')
    <h1>Personas</h1>
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
                            <a href="{{ route('persons.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Razón social</th>
										<th>Tipo</th>
										<th>Persona</th>
										<th>RFC</th>
										<th>Domicilio</th>
										<th>Email</th>
										<th>Telefono</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($persons as $person)
                                        <tr>
                                            <td>{{ $person->id }}</td>
											<td>{{ $person->razonSocial }}</td>
											<td>{{ $person->tipo }}</td>
											<td>{{ $person->persona }}</td>
											<td>{{ $person->rfc }}</td>
											<td>{{ $person->domicilio }}</td>
											<td>{{ $person->email }}</td>
											<td>{{ $person->telefono }}</td>
                                            <td>
                                                <form action="{{ route('persons.destroy',$person->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('persons.show',$person->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('persons.edit',$person->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
