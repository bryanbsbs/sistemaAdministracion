@extends('layouts.general_index')

@section('title', 'Pagos y anticipos')

@section('content_header')
    <h1>Pagos y anticipos</h1>
@stop

@section('content')
    @include('fragments.sesion')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                        @can('transactions.create')
                            <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Registrar pago') }}
                            </a>
                        @endcan

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
										<th>Monto</th>
										<th>Fecha</th>
										<th>Metodo</th>
										<th>Razón social</th>
										<th>Tipo</th>
										<th>Proyecto</th>
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
                                                <a class="btn btn-sm btn-primary " href="{{ route('transactions.show',$row->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                @can('transactions.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('transactions.edit',$row->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                @endcan
                                                @can('transactions.destroy')
                                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{ $row->id }}"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                @endcan
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

    <div class="modal fade" id="deleteModal" role="dialog" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Eliminar Transacción</h5>
              <button type="button" class="close" data-bs-dismiss="modal">&times</button>
            </div>

            <div class="modal-body">
              <p>¿Estás seguro de eliminar esta transacción?</p>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <form id="formDelete" action="{{ route('transactions.destroy', 0) }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger" type="submit">Eliminar</button>
              </form>
            </div>

          </div>
        </div>
      </div>

      <script>
        var deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', function (event) {
          var button = event.relatedTarget
          var id = button.getAttribute('data-bs-id')
          console.log(id)
          var action = formDelete.getAttribute('action').slice(0, -1) + id;
          formDelete.action = action;
        })
    </script>
@endsection
