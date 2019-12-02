@extends('layouts.master')
@section('title')
Tambah Servis | Auroralink
@stop

@section('content')
<div class="form-box">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">#Servis Information
                {{--  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_form">
                    <i class="fa fa-plus"> Pelanggan Baru</i>
                </button>  --}}
                </h3>
            </div>
            <div class="panel-body">
            {!! Form::open(['route' => ['servis.store'], 'method'=> 'POST']) !!}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                             <label for="">Nama Pelanggan</label>
                            <select id="users_id" class="form-control select" name="users_id">
                                <option value="#">-- Pilih Pelanggan --</option>
                                @foreach (\App\User::all() as $jp)
                                <option value="{{$jp->id}}">{{$jp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tanggal Terima</label>
                            <input name="receive_at" type="date" class="form-control" id="datepick" required="" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">No Servis</label>
                            <input type="text" class="form-control" placeholder="#SE-HDAJHBUSHK" disabled="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Teknisi</label>
                            <select id="team_id" class="form-control select" name="team_id">
                                <option value="#">-- Pilih Teknisi --</option>
                                @foreach (\App\Model\Team::all() as $jp)
                                <option value="{{$jp->id}}">{{$jp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input name="keterangan" type="text" class="form-control" placeholder="Masukan Keterangan">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
                <h3 class="panel-title">#Device Information <span class="badge bg-red">#123</span>
                <a href="{{ route('servis_item.create') }}"  class="btn-sm btn-success modal-show">
                    <i class="fa fa-plus "> Tambah Device</i>
                </a>
                </h3>
        </div>
            <div class="panel-body">
                <div class="device-info">
                    <div class="row">
                        <table id="datatable" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <td>No </td>
                                <td>Merk</td>
                                <td>Serial Number</td>
                                <td>Warna</td>
                                <td>Garansi</td>
                                <td>Kelengkapan</td>
                                <td>Biaya</td>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            {{--  <tfoot>
                                <tr>
                                    <th colspan="5"></th>
                                    <th align="right">Total </th>
                                    <th align="right" class="gray">Rp. 500.000,-</th>
                                </tr>
                            </tfoot>  --}}
                        </table>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>

{!! Form::close() !!}
@endsection
<script type="text/javascript" src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){
    $('#datatable').DataTable(
    {
    processing: true,
    serverSide: true,
    ajax: "{{route('device.json')}}",
    columns: [
        // { data: 'checkbox', orderable:false, searchable:false },
         { data: 'id', name: 'id' },
        { data: 'merk', name: 'merk' },
        { data: 'serial_number', name: 'serial_number' },
        { data: 'warna', name: 'warna' },
        { data: 'garansi', name: 'garansi' },
        { data: 'kelengkapan', name: 'kelengkapan' , render : function(data, type, row) {
              return '<span class="badge bg-blue">'+data+'</span>'
          }  },
        { data: 'biaya', name: 'biaya', render: function ( data, type, row ) {
            return commaSeparateNumber("Rp. " + data);
            }  },
     //   { data: 'action', orderable:false, searchable:false },
    ]
    }
    );
});
function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
    }
    return val;
}
</script>
