@extends('adminlte::page')

@section('title', 'Personas')

@section('content_header')
    <h1>Personas</h1>
@stop

@section('content')


    <livewire:personas />

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
