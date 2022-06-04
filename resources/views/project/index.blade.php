@extends('adminlte::page')

@section('title', 'Proyectos')

@section('content_header')
    <h1>Proyectos</h1>
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
                            <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Estado</th>
										<th>Nombre</th>
										<th>Fecha inicio</th>
										<th>Subtotal</th>
										<th>IVA</th>
										<th>Total</th>
										<th>Pagos</th>
										<th>Anticipos</th>
										<th>Concepto</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->id }}</td>
											<td>{{ $project->estado }}</td>
											<td>{{ $project->nombre }}</td>
											<td>{{ $project->fechaInicio }}</td>
											<td>{{ $project->subtotal }}</td>
											<td>{{ $project->iva }}</td>
											<td>{{ $project->total }}</td>
											<td>{{ $project->progresoPago }}</td>
											<td>{{ $project->progresoAnticipo }}</td>
											<td>{{ $project->concepto }}</td>
                                            <td>
                                                <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('projects.show',$project->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('projects.edit',$project->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a> @csrf
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
