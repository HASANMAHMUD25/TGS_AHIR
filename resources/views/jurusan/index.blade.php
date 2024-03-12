@extends('adminlte::page')
@section('title', 'Data Jurusan')
@section('content_header')
<h1>Data Jurusan</h1>
@stop
@section('content')
<p>Welcome to this beautiful admin panel.</p>
@php
    $ar_judul = ['No','Nama', 'Aksi'];
    $no = 1;
@endphp
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3><br>
        <a href="{{ route('jurusan.create')}}" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> &nbsp; Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    @foreach ($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($ar_jurusan as $jurusan)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $jurusan->nama }}</td>
                    <td class="text-center">
                        <form method="POST" action="{{ route('jurusan.destroy', $jurusan->id) }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info" href="{{ route('jurusan.show', $jurusan->id) }}"><i class="far fa-eye"></i> &nbsp;Detail</a>
                            <a class="btn btn-success" href="{{ route('jurusan.edit', $jurusan->id) }}"><i class="fas fa-pencil-alt"></i> &nbsp;Edit</a>
                            <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data diHapus?')"><i class="fas fa-trash"></i> &nbsp;Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset ('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset ('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop
@section('js')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset ('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<!-- <script>
    console.log('Hi!');
</script> -->
@stop
