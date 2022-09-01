@extends('adminlte::page')

@section('title', 'Atualizar dados do Usuários')

@section('content_header')
    <h1>Atualizar dados do Usuários</h1>
@stop

@section('content')
@include('_mensagens')
    <form action="{{route('usuarios.update', $usuario)}}" method="post">
        @method('PUT')
        @include('usuarios._form')
    </form>
@stop

