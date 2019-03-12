<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $ausentismo->id !!}</p>
</div>

<!-- Fecha Registro Field -->
<div class="form-group">
    {!! Form::label('fecha_registro', 'Fecha Registro:') !!}
    <p>{!! $ausentismo->fecha_registro->toDateString() !!}</p>
</div>

<!-- Id Empleado Field -->
<div class="form-group">
    {!! Form::label('id_empleado', 'Id Empleado:') !!}
    <p>{!! $ausentismo->id_empleado !!}</p>
</div>

<!-- Id Tipoausentismo Field -->
<div class="form-group">
    {!! Form::label('id_tipoausentismo', 'Id Tipoausentismo:') !!}
    <p>{!! $ausentismo->id_tipoausentismo !!}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
    <input id="fechaqwe" value={{ $ausentismo->fecha_inicio->toDateString() }}>
</div>

<!-- Tiempo Ausencia Field -->
<div class="form-group">
    {!! Form::label('tiempo_ausencia', 'Tiempo Ausencia:') !!}
    <input id="tiempo_ausencia" value={{ $ausentismo->tiempo_ausencia }}>
</div>

<div class="form-group">
    {!! Form::label('fecha_final', 'Fecha Final:') !!}
    <input id="fecha_final" >
</div>

<!-- Costo Ausencia Field -->
<div class="form-group">
    {!! Form::label('costo_ausencia', 'Costo Ausencia:') !!}
    <p>{!! $ausentismo->costo_ausencia !!}</p>
</div>

<!-- Grado Field -->
<div class="form-group">
    {!! Form::label('Grado', 'Grado:') !!}
    <p>{!! $ausentismo->Grado !!}</p>
</div>

<!-- Observacion Field -->
<div class="form-group">
    {!! Form::label('observacion', 'Observacion:') !!}
    <p>{!! $ausentismo->observacion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $ausentismo->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $ausentismo->updated_at !!}</p>
</div>

<a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create" id="botonProrroga" >Anadir Prorroga</a>
@include('ausentismos.modal')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script>
     $(document).ready(function() {
        var fecha_aux = document.getElementById("fechaqwe").value.split("-");
        console.log(fecha_aux);
    var Fecha1 = new Date(parseInt(fecha_aux[0]),parseInt(fecha_aux[1]-1),parseInt(fecha_aux[2]));
    //  console.log(Fecha1.setDate(Fecha1.getDate + 5));
     Hoy = new Date();//Fecha actual del sistema

     var diasAniadir = document.getElementById("tiempo_ausencia").value;
     
     var diasAnadir = parseInt(diasAniadir);

     var AnyoFecha = Fecha1.getFullYear();
     var MesFecha = Fecha1.getMonth() + 1;
     var DiaFecha = Fecha1.getDate() + diasAnadir;
     
     var Fecha2 = AnyoFecha+"-"+MesFecha+"-"+DiaFecha; 
    //  var Fecha3 = Date.parse(Fecha2);
    //  var Fecha4 = new Date(Fecha3);
    document.getElementById('fecha_final').value=Fecha2;
    console.log(Fecha2);
     
      
     var AnyoHoy = Hoy.getFullYear();
     var MesHoy = Hoy.getMonth();
     var DiaHoy = Hoy.getDate();

     var producto1 = document.getElementById('botonProrroga');
                 if (AnyoFecha >= AnyoHoy && MesFecha >= MesHoy && DiaFecha >= DiaHoy){
                    producto1.style.display = 'inline';
                 }
                 else{
                    producto1.style.display = 'none';
                 }
    })
            </script>