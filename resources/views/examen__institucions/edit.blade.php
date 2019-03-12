@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Examen  Institucion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($examenInstitucion, ['route' => ['examenInstitucions.update', $examenInstitucion->id], 'method' => 'patch']) !!}

                        @include('examen__institucions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection