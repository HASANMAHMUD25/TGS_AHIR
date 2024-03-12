@extends('adminlte::page')
@section('title', 'Detail Jurusan')
@section('content_header')
    <h1>Data Jurusan</h1>
@stop
@section('content')
    <div class="media">
        <div class="media-body">
            <h3><u>{{ $jurusan->nama }}</u></h3>
            <p>
                Nama : {{ $jurusan->nama }}
            </p>
            <hr/>
            <a href="{{ url('/jurusan') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
