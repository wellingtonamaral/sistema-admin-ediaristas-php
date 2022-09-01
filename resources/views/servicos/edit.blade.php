@extends('adminlte::page')

@section('title', 'Atualizar dados do Serviço')

@section('content_header')
    <h1>Atualizar dados do Serviço</h1>
@stop

@section('content')
@include('_mensagens')
    <form action="{{route('servicos.update', $servico)}}" method="post">
        @method('PUT')
        @include('servicos._form')
    </form>
@stop

