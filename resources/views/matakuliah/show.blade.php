@extends('adminlte::page')
@section('title', 'Form Matakuliah')
@section('content_header')
<h1>Data Matakuliah</h1>
@stop
@section('content')
<div class="media-body">
    <h3><u>{{ $matakuliah->nama }}</u></h3>
    <p>
        Nama : {{ $matakuliah->nama }}
        Nilai : {{ $matakuliah->nilai }}
    </p>
    <hr/>
    <a href="{{ url('/matakuliah') }}" class="btn btn-primary">Go Back</a>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop
