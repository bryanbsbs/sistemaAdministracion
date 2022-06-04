<div class="box box-info padding-1">
    <div class="box-body">

        <div class="mb-3">
            <label for="person_id">Persona</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" id="person_id" name="person_id">
                <option value="">Seleccione una opción</option>
                @foreach ($persons as $person)
                    <option value="{{ $person->id }}" @if($transaction->person_id == $person->id) {{ 'selected' }} @endif>{{ $person->razonSocial }}</option>
                @endforeach
            </select><br>
        </div>

        <div class="mb-3">
            <label for="project_id">Proyecto</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" id="project_id" name="project_id">
                <option value="">Seleccione una opción</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" @if($transaction->project_id == $project->id) {{ 'selected' }} @endif>{{ $project->nombre }}</option>
                @endforeach
            </select><br>
        </div>

        <div class="form-group">
            <label for="monto" class="form-label">Monto</label>
            <input type="text" name="monto" class="form-control" id="monto" value="{{ old("monto", $transaction->monto) }}" required>
        </div>
        <div class="form-group">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" id="fecha" value="{{ old("fecha", $transaction->fecha) }}" required>
        </div>
        <div class="mb-3">
            <label for="metodo">Metodo</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" id="metodo" name="metodo">
                    <option value="">Selecciona una opcion</option>
                    <option value="Deposito" @if($transaction->metodo == 'Deposito') {{ 'selected' }} @endif>Deposito</option>
                    <option value="Transferencia" @if($transaction->metodo == 'Transferencia') {{ 'selected' }} @endif>Transferencia</option>
            </select><br>
        </div>
        <div class="form-group">
            <label for="referencia" class="form-label">Referencia</label>
            <input type="text" name="referencia" class="form-control" id="referencia" value="{{ old("referencia", $transaction->referencia) }}" required>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
