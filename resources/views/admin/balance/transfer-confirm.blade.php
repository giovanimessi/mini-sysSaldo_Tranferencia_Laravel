@extends('adminlte::page')

@section('title', 'Confirmar Transferencia')

@section('content_header')
<ol class="breadcrumb">

    <li><a href="{{ route('home') }}"> Dashboard - </a></li>
    <li><a href="{{route('deposito')}}"> Depositar - </a></li>

    <li><a href="{{route('draw')}}"> Saldos</a></li>
    <li><a href="{{route('transf')}}"> Transferencia </a></li>
    <li><a href=" "> Confrimar </a></li>



</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header ">
       <h3><p>Confirme a transferencia::</p><strong>{{$sender->name}}</strong></h3>



    </div>
    <div class="box-body">

        @include('admin.includes.alerts')
        <form method="POST" action="{{route('confirmar.store')}}">
            @csrf
            <div class="form-group">
                <input type="text" name="balance" placeholder=" valor" >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Transferir</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop