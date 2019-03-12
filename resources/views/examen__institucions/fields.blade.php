<!-- Cod Examen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod_examen', 'Cod Examen:') !!}
    {!! Form::text('cod_examen', null, ['class' => 'form-control']) !!}
</div>

<!-- Cod Institucion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod_institucion', 'Cod Institucion:') !!}
    {!! Form::text('cod_institucion', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Particular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_particular', 'Valor Particular:') !!}
    {!! Form::text('valor_particular', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Previser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_previser', 'Valor Previser:') !!}
    {!! Form::text('valor_previser', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('examenInstitucions.index') !!}" class="btn btn-default">Cancel</a>
</div>
