<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old("name", $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ old("email", $user->email) }}" required>
        </div>

        <h2 class="h5">Listado de roles</h2>
        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT']) !!}
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
        {!! Form::close() !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
