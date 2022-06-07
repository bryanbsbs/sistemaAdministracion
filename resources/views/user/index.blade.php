@extends('layouts.general_index')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    @include('fragments.sesion')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear nuevo') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
										<th>Nombre</th>
										<th>Email</th>
										<th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{ $user->id }}"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
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
              <h5 class="modal-title" id="modalLabel">Eliminar usera</h5>
              <button type="button" class="close" data-bs-dismiss="modal">&times</button>
            </div>

            <div class="modal-body">
              <p>Si borras este registro tambien se borraran todos los pagos o anticipos relacionados con el. ¿Estas seguro de eliminarlo?</p>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <form id="formDelete" action="{{ route('users.destroy', 0) }}" method="POST">
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

