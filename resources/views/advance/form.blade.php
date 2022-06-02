<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('costumer_id') }}
            {{ Form::text('costumer_id', $advance->costumer_id, ['class' => 'form-control' . ($errors->has('costumer_id') ? ' is-invalid' : ''), 'placeholder' => 'Costumer Id']) }}
            {!! $errors->first('costumer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('project_id') }}
            {{ Form::text('project_id', $advance->project_id, ['class' => 'form-control' . ($errors->has('project_id') ? ' is-invalid' : ''), 'placeholder' => 'Project Id']) }}
            {!! $errors->first('project_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monto') }}
            {{ Form::text('monto', $advance->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $advance->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('metodo') }}
            {{ Form::text('metodo', $advance->metodo, ['class' => 'form-control' . ($errors->has('metodo') ? ' is-invalid' : ''), 'placeholder' => 'Metodo']) }}
            {!! $errors->first('metodo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('referencia') }}
            {{ Form::text('referencia', $advance->referencia, ['class' => 'form-control' . ($errors->has('referencia') ? ' is-invalid' : ''), 'placeholder' => 'Referencia']) }}
            {!! $errors->first('referencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>