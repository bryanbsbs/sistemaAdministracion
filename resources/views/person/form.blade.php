<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="razonSocial" class="form-label">Razon social</label>
            <input type="text" name="razonSocial" class="form-control" id="razonSocial" value="{{ old("razonSocial", $person->razonSocial) }}" required>
        </div>

        <div class="mb-3">
            <label for="persona">Persona</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" id="persona" name="persona" required>
                <option value="">Seleccione una opcion</option>
                <option value="Fisica" @if ($person->persona == "Fisica") {{ "selected" }} @endif>Fisica</option>
                <option value="Moral" @if ($person->persona == "Moral") {{ "selected" }} @endif>Moral</option>
            </select><br>
        </div>

        <div class="form-group">
            <label for="rfc" class="form-label">RFC</label>
            <input type="text" name="rfc" class="form-control" id="rfc" value="{{ old("rfc", $person->rfc) }}" required>
        </div>

        <div class="form-group">
            <label for="domicilio" class="form-label">Domicilio</label>
            <input type="text" name="domicilio" class="form-control" id="domicilio" value="{{ old("domicilio", $person->domicilio) }}" required>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ old("email", $person->email) }}" required>
        </div>

        <div class="form-group">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old("telefono", $person->telefono) }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo">Tipo</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" id="tipo" name="tipo" required>
                <option value="">Seleccione una opcion</option>
                <option value="Cliente" @if ($person->tipo == "Cliente") {{ "selected" }} @endif>Cliente</option>
                <option value="Proveedor" @if ($person->tipo == "Proveedor") {{ "selected" }} @endif>Proveedor</option>
             </select><br>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
