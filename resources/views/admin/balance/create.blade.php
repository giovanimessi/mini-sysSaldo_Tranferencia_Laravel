@extends('adminlte::page')

@section('title', 'HISTORICO')

@section('content_header')
<ol class="breadcrumb">

    <li><a href="{{ route('home') }}"> Dashboard - </a></li>
    <li><a href="{{route('deposito')}}"> Depositar - </a></li>

    <li><a href="{{route('deposito')}}"> Saldo</a></li>

</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header ">
       <h3>Fazer Recarga</h3>



    </div>
    <div class="box-body">

        @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
                
            @endforeach
        </div>
            
        @endif
        <form method="POST" action="{{route('store')}}">
            @csrf
            <div class="form-group">
                <input type="text" name="amount" placelholder=" valo da recargar" >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Recarregar</button>
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