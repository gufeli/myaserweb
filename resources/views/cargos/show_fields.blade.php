<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cargo->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $cargo->name !!}</p>
</div>

<!-- Creado en Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado en:') !!}
    <p>{!! $cargo->created_at !!}</p>
</div>

<!-- Actualizado en Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{!! $cargo->updated_at !!}</p>
</div>

