@extends('adminlte::page')  
@section('title', 'Form Jurusan')  
@section('content_header')
    <h1>Form Jurusan</h1>  
@stop  
@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Silahkan Mengisi Form Terlebih Dahulu!</h3>
    </div>

    <form class="form-horizontal" method="post" action="{{ route('jurusan.store')}}">
        @csrf
        <div class="card-body">

            <!-- Nama Lengkap -->
                        <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4"> <!-- Bagian ini untuk input "Nama" -->
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Anda">
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-4"> <!-- Bagian ini untuk input "Jurusan" -->
                    <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Masukkan Jurusan Anda">
                </div>
</div>


      
            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li> 
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ route('jurusan.index') }}" class="btn btn-primary">Batal</a>
        </div>
    </form>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        /* Add your custom styles here */
    </style>
@stop

@section('js')
    <script> console.log('Hi!');</script>
@stop
