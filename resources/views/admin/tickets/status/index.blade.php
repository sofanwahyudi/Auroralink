@extends('layouts.master')
@section('title')
    Team | Tickets Status
@endsection
@section('content_header')
    <h1>
        <span class="fa fa-users"></span> Tickets Status
        <a href="{{route('status.create')}}" class="btn-sm btn-primary modal-show"><span class="fa fa-plus"></span> Tambah Data</a>
    </h1>
    <ol class="breadcrumb">
    <li>
    {{-- <a href="{{route('export_part_xls')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file-excel-o" style="color:white"></span> Export Excel</a>
    <a href="{{route('export_part_csv')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file" style="color:white"></span> Export Csv</a> --}}
    </li>
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Tickets</li>
      <li class="active">Tickets Status</li>
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
    ajax: "{{route('status.json')}}",
    columns: [
        { data: 'name', name: 'name' },
        { data: 'action', orderable:false, searchable:false },
    ],
    }
    );
});
</script>
