@extends('layouts.master')
@section('title')
Servis | Auroralink
@stop
@section('content_header')
    <h1>
        <span class="fa fa-filter"></span> Servis
        <a href="{{route('servis.create')}}"  class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
        <a href="#" data-url="" class="btn-sm btn-danger delete-all"><span class="fa fa-trash"></span> Hapus Data Terpilih</a>
    {{-- <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Delete All</button> --}}
    </h1>
    <ol class="breadcrumb">
    <li>
    <a href="{{route('export_kategori_xls')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file-excel-o" style="color:white"></span> Export Excel</a>
    <a href="{{route('export_kategori_csv')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file" style="color:white"></span> Export Csv</a>
    </li>
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Task</li>
      <li class="active">Servis</li>
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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kode Servis</th>
                    {{--  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Pelanggan</th>  --}}
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Teknisi</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tgl Terima</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Keterangan</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kelengkapan</th>
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
    ajax: "{{route('servis.json')}}",
    columns: [
        // { data: 'checkbox', orderable:false, searchable:false },
        // { data: 'id', name: 'id' },
        { data: 'kode_servis', name: 'kode_servis' },
       // { data: 'pelanggan', name: 'pelanggan' },
        { data: 'teknisi', name: 'teknisi' },
        { data: 'recieve_at', name: 'recieve_at' },
        { data: 'keterangan', name: 'keterangan' },
        { data: 'status', name: 'status', render : function(data, type, row) {
              return '<span class="badge bg-blue">'+data+'</span>'
          }   },
          { data: 'kelengkapan', name: 'kelengkapan', render : function(data, type, row) {
            return '<span class="badge bg-blue">'+data+'</span>'
        }   },
        { data: 'action', orderable:false, searchable:false },
    ]
    }
    );
});
</script>
