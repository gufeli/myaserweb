@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Estadisticas</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('estadisticas.create') !!}">Añadir nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('estadisticas.table')
                    <div class="panel-body">
                    {!! $pie->html() !!}
                </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>


    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {!! Charts::scripts() !!}
    {!! $pie->script() !!}
@endsection

