<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="razonSocial" class="form-label">Razon social</label>
            <input type="text" name="razonSocial" class="form-control" id="razonSocial" value="{{ old("razonSocial", $costumer->razonSocial) }}" required>
        </div>

        <div class="mb-3">
            <label for="persona">Persona</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" id="persona" name="persona">
                <option value="Fisica" selected>Fisica</option>
                <option value="Moral">Moral</option>
            </select><br>
        </div>

        <div class="form-group">
            <label for="rfc" class="form-label">RFC</label>
            <input type="text" name="rfc" class="form-control" id="rfc" value="{{ old("rfc", $costumer->rfc) }}" required>
        </div>

        <div class="form-group">
            <label for="domicilio" class="form-label">Domicilio</label>
            <input type="text" name="domicilio" class="form-control" id="domicilio" value="{{ old("domicilio", $costumer->domicilio) }}" required>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ old("email", $costumer->email) }}" required>
        </div>

        <div class="form-group">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old("telefono", $costumer->telefono) }}" required>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
