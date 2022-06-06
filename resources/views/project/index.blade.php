@extends('adminlte::page')

@section('title', 'Proyectos')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@stop

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
                            <table class="table table-striped table-hover" id="projects"> 
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

@section('js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>    
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>    
    <script>
        $('#projects').DataTable({
            responsive: true, 
            autoWidth: false
        });
    </script>
@stop
