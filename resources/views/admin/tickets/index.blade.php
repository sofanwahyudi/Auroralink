@extends('layouts.master')
@section('title')
    Tickets | Auroralink
@endsection
@section('content_header')
    <h1>
        <span class="fa fa-ticket"></span> Tickets
        <a href="{{route('tickets.create')}}" class="btn-sm btn-primary modal-show"><span class="fa fa-plus"></span> Tambah Data</a>
    </h1>
    <ol class="breadcrumb">
    <li>
    {{-- <a href="{{route('export_part_xls')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file-excel-o" style="color:white"></span> Export Excel</a>
    <a href="{{route('export_part_csv')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file" style="color:white"></span> Export Csv</a> --}}
    </li>
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tickets</li>
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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No Tickets</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Subject</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Slug</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kategori</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Prioritas</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Pelanggan</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Team</th>

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
    ajax: "{{route('tickets.json')}}",
    columns: [
        { data: 'no_ticket', name: 'no_ticket' },
        { data: 'subject', name: 'subject' },
        { data: 'slug', name: 'slug' },
        { data: 'status', name: 'status', render : function(data, type, row) {
              return '<span class="badge bg-blue">'+data+'</span>'
          }  },
        { data: 'category', name: 'category', render : function(data, type, row) {
              return '<span class="badge bg-green">'+data+'</span>'
          }  },
        { data: 'priority', name: 'priority', render : function(data, type, row) {
            return '<span class="badge bg-red">'+data+'</span>'
        }  },
        { data: 'users', name: 'users' },
        { data: 'team', name: 'team' },
        { data: 'action', orderable:false, searchable:false },
    ],
    }
    );
});
</script>
