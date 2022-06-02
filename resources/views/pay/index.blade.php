@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1>Pagos</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                        <a href="{{ route('pays.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                            {{ __('Crear nuevo') }}
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
                                        <th>No</th>

										<th>Provider</th>
										<th>Project</th>
										<th>Monto</th>
										<th>Fecha</th>
										<th>Metodo</th>
										<th>Referencia</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pays as $pay)
                                        <tr>
                                            <td>{{ $pay->id }}</td>
											<td>{{ $pay->provider_id }}</td>
											<td>{{ $pay->project_id }}</td>
											<td>{{ $pay->monto }}</td>
											<td>{{ $pay->fecha }}</td>
											<td>{{ $pay->metodo }}</td>
											<td>{{ $pay->referencia }}</td>

                                            <td>
                                                <form action="{{ route('pays.destroy',$pay->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pays.show',$pay->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pays.edit',$pay->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pays->links() !!}
            </div>
        </div>
    </div>
@endsection
