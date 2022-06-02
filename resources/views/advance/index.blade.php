@extends('adminlte::page')

@section('title', 'Anticipos')

@section('content_header')
    <h1>Anticipos</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('advances.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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

										<th>Costumer Id</th>
										<th>Project Id</th>
										<th>Monto</th>
										<th>Fecha</th>
										<th>Metodo</th>
										<th>Referencia</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($advances as $advance)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $advance->costumer_id }}</td>
											<td>{{ $advance->project_id }}</td>
											<td>{{ $advance->monto }}</td>
											<td>{{ $advance->fecha }}</td>
											<td>{{ $advance->metodo }}</td>
											<td>{{ $advance->referencia }}</td>

                                            <td>
                                                <form action="{{ route('advances.destroy',$advance->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('advances.show',$advance->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('advances.edit',$advance->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $advances->links() !!}
            </div>
        </div>
    </div>
@endsection
