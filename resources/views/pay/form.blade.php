<div class="box box-info padding-1">
    <div class="box-body">

        <div class="mb-3">
            <label for="provider_id">Proveedor</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" id="provider_id" name="provider_id">
                @foreach ($providers as $provider)
                    <option value="{{ $provider->id }}" selected>{{ $provider->razonSocial }}</option>
                @endforeach
            </select><br>
        </div>

        <div class="mb-3">
            <label for="project_id">Proyecto</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" id="project_id" name="project_id">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" selected>{{ $project->nombre }}</option>
                @endforeach
            </select><br>
        </div>

        <div class="form-group">
            <label for="monto" class="form-label">Monto</label>
            <input type="text" name="monto" class="form-control" id="monto" value="{{ old("monto", $pay->monto) }}" required>
        </div>
        <div class="form-group">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="text" name="fecha" class="form-control" id="fecha" value="{{ old("fecha", $pay->fecha) }}" required>
        </div>
        <div class="form-group">
            <label for="metodo" class="form-label">Metodo</label>
            <input type="text" name="metodo" class="form-control" id="metodo" value="{{ old("metodo", $pay->metodo) }}" required>
        </div>
        <div class="form-group">
            <label for="referencia" class="form-label">Referencia</label>
            <input type="text" name="referencia" class="form-control" id="referencia" value="{{ old("referencia", $pay->referencia) }}" required>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
