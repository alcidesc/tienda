@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
  <livewire:productos></livewire:productos>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop