@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <ol class="breadcrumb">

        <li><a href="{{ route('home') }}"> Dashboard - </a></li>
        <li><a href=""> Saldo</a></li>

    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header ">
           <p> <a href="{{route('deposito')}}" class="btn btn-primary"><i class="fas fa-cart-plus"></i>Recarregar</a></p>
           <a href="" class="btn btn-danger"><i class="fas fa-cart-arrow-down"></i>Sacar</a></p>



        </div>
        <div class="box-header">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>R$ {{number_format($amount,2,',','.')}}</h3>


                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer"><a href="{{ route('historico') }}">Historico</a> <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


        </div>
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
