@extends('adminlte::page')

@section('title', 'clientes')

@section('content_header')
    <h1>clientes</h1>
@stop

@section('content')
  <livewire:clientes></livewire:clientes>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop