@extends('adminlte::page')

@section('title', 'HISTORICO')

@section('content_header')
<ol class="breadcrumb">

    <li><a href="{{ route('home') }}"> Dashboard - </a></li>
    <li><a href="{{route('deposito')}}"> Depositar - </a></li>

    <li><a href="{{route('draw')}}"> Saldo</a></li>

</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header ">
       <h3>Fazer Retirada</h3>



    </div>
    <div class="box-body">

        @include('admin.includes.alerts')
        <form method="POST" action="{{route('drawstore')}}">
            @csrf
            <div class="form-group">
                <input type="text" name="amount" placelholder=" valor da retirada" >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Sacar</button>
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