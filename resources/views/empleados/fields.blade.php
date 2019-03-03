<!-- Identificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identificacion', 'Identificacion:') !!}
    {!! Form::number('identificacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::number('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Correoelectronico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correoelectronico', 'Correoelectronico:') !!}
    {!! Form::text('correoelectronico', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Tipovinculacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_tipovinculacion', 'Tipo de vinculacion:') !!}
    {!! Form::select('id_tipovinculacion', $tipoVinculacion ,null, ['class' => 'form-control']) !!}
</div>

<!-- Fechadenacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechadenacimiento', 'Fecha de nacimiento:') !!}
    {!! Form::date('fechadenacimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Salario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salario', 'Salario:') !!}
    {!! Form::number('salario', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cargo', 'Cargo:') !!}
    {!! Form::select('id_cargo', $cargo ,null, ['class' => 'form-control']) !!}
</div>

<!-- Id Sede Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_sede', 'Sede:') !!}
    {!! Form::select('id_sede', $sede ,null, ['class' => 'form-control']) !!}
</div>

<!-- Fechadeingreso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechadeingreso', 'Fechadeingreso:') !!}
    {!! Form::date('fechadeingreso', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Genero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero', 'Genero:') !!}
    {!! Form::text('genero', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('empleados.index') !!}" class="btn btn-default">Cancel</a>
</div>
