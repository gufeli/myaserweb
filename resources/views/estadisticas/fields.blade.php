<!-- Año Field -->
<div class="form-group col-sm-6">
    {!! Form::label('año', 'Año:') !!}
    {!! Form::number('año', null, ['class' => 'form-control']) !!}
</div>

<!-- Ia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ta', 'Ta:') !!}
    {!! Form::number('ta', $totalTasaAccidentalidad,null, ['class' => 'form-control']) !!}
</div>

<!-- Is Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is', 'Is:') !!}
    {!! Form::number('is', $totalFrecuenciaAccidentes,null, ['class' => 'form-control']) !!}
</div>

<!-- If Field -->
<div class="form-group col-sm-6">
    {!! Form::label('if', 'If:') !!}
    {!! Form::number('if', $totalSeveridadAccidente,null, ['class' => 'form-control']) !!}
</div>

<!-- Ma Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ma', 'Ma:') !!}
    {!! Form::number('ma', $TotalMortalidadAccidente,null, ['class' => 'form-control']) !!}
</div>

<!-- Ili Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ili', 'Ili:') !!}
    {!! Form::number('ili', $indiceLeccionesIncapacitantes,null, ['class' => 'form-control', 'onChange' => 'setTwoNumberDecimal']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('estadisticas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
