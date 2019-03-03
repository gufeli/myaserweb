@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ausentismo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ausentismo, ['route' => ['ausentismos.update', $ausentismo->id], 'method' => 'patch']) !!}

                        @include('ausentismos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection