@extends('layouts.master')
@section('title')
Kelengkapan | Auroralink
@stop
@section('content_header')
    <h1>
        <span class="fa fa-filter"></span> Kelengkapan
        <a href="{{route('kelengkapan.create')}}"  class="btn-sm btn-primary modal-show"><span class="fa fa-plus"></span> Tambah Data</a>
        <a href="#" data-url="" class="btn-sm btn-danger delete-all"><span class="fa fa-trash"></span> Hapus Data Terpilih</a>
    {{-- <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Delete All</button> --}}
    </h1>
    <ol class="breadcrumb">
    <li>
    <a href="{{route('export_kategori_xls')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file-excel-o" style="color:white"></span> Export Excel</a>
    <a href="{{route('export_kategori_csv')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file" style="color:white"></span> Export Csv</a>
    </li>
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Servis</li>
      <li class="active">Kelengkapan</li>
    </ol>
@endsection
@section('content')
    <div class="box box-warning">
        <div class="box-header with-border">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div><br />
          @endif
          @if(Session::has('success'))
            <div class="alert alert-success">
            <strong>Success: </strong>{{ Session::get('success') }}
            </div>
            @endif

            <table id="datatable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    {{-- <th class="sorting_asc"> <input type="checkbox" id="check_all"></th> --}}
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>

                </tbody>
        </table>
        </div>
    </div>
@endsection
<script type="text/javascript" src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>

<script>
$(document).ready(function(){
    $('#datatable').DataTable(
    {
    processing: true,
    serverSide: true,
    ajax: "{{route('kelengkapan.json')}}",
    columns: [
        // { data: 'checkbox', orderable:false, searchable:false },
        // { data: 'id', name: 'id' },
        { data: 'nama', name: 'nama' },
        { data: 'action', orderable:false, searchable:false },
    ]
    }
    );
});
</script>
