<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old("nombre", $project->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="fechaInicio" class="form-label">Fecha inicio</label>
            <input type="date" name="fechaInicio" class="form-control" id="fechaInicio" value="{{ old("fechaInicio", $project->fechaInicio) }}" required>
        </div>

        <div class="form-group">
            <label for="subtotal" class="form-label">Subtotal</label>
            <input type="text" name="subtotal" class="form-control" id="subtotal" value="{{ old("subtotal", $project->subtotal) }}" required>
        </div>

        <div class="form-group">
            <label for="concepto" class="form-label">Concepto</label>
            <input type="text" name="concepto" class="form-control" id="concepto" value="{{ old("concepto", $project->concepto) }}" required>
        </div>

        <div class="form-group">
            <label for="comentariosAdicionales" class="form-label">Comentarios adicionales</label>
            <input type="text" name="comentariosAdicionales" class="form-control" id="comentariosAdicionales" value="{{ old("comentariosAdicionales", $project->comentariosAdicionales) }}" required>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
