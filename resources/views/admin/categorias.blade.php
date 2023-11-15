@extends('adminlte::page')

@section('title', 'categorias')

@section('content_header')
    <h1>categorias</h1>
@stop

@section('content')
  <livewire:categorias></livewire:categorias>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop