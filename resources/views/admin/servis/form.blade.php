@extends('layouts.master')
@section('title')
Tambah Servis | Auroralink
@stop

@section('content')
<div class="form-box">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">#Servis Information
                <a href="{{route('pelanggan.create')}}" class="btn-sm btn-primary modal-show" title="Tambah Data"><span class="fa fa-plus"></span> Tambah Data Pelanggan</a>
                </h3>
            </div>
            <div class="panel-body">
            {!! Form::open(['route' => ['servis.store'], 'method'=> 'POST']) !!}
                <div class="row">
                    <div class="col-md-3 required">
                        <div class="form-group">
                             <label for="">Nama Pelanggan</label>
                            <select id="users_id" class="form-control select2" name="users_id">
                                <option value="#">-- Pilih Pelanggan --</option>
                                @foreach (\App\Model\Pelanggan::all() as $jp)
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
                            <label for="">Teknisi</label>
                            <select id="team_id" class="form-control select2" name="team_id">
                                <option value="#">-- Pilih Teknisi --</option>
                                @foreach (\App\Model\Team::all() as $jp)
                                <option value="{{$jp->id}}">{{$jp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 required">
                        <div class="form-group required">
                            <label for="">Keterangan</label>
                            <input name="keterangan" type="text" class="form-control required" placeholder="Masukan Keterangan">
                        </div>
                    </div>

                </div>
            </div>
        </div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">#Form Device </h3>
    </div>
<div class="panel-body">
<form action="#" id="form">
            <input type="hidden" value="" name="id"/>
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">Serial Number</label>
                    <div class="col-md-9">
                        <input name="sn" id="sn" placeholder="Serial Number" class="form-control" type="text" required="">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Warna</label>
                    <div class="col-md-9">
                        <input name="warna" id="warna" placeholder="Warna" class="form-control" type="Warna" required="">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Merk</label>
                    <div class="col-md-9">
                        <select id="merk" class="form-control select2" name="merk">
                                <option value="#">-- Pilih Merk --</option>
                                @foreach (\App\Model\Merk::all() as $jp)
                                <option value="{{$jp->name}}">{{$jp->name}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Garansi</label>
                    <div class="col-md-9">
                        <select name="garansi" id="garansi" class="form-control select2" name="garansi_id">
                                    <option value="#">-- Pilih Status Garansi--</option>
                                    @foreach (\App\Model\Garansi::all() as $jp)
                                    <option value="{{$jp->nama}}">{{$jp->nama}}</option>
                                    @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Kelengkapan</label>
                    <div class="col-md-9">
                        <select name="kelengkapan" id="kelengkapan[]" class="form-control select2" multiple="multiple" name="kelengkapan[]">
                            @foreach (\App\Model\Kelengkapan::all() as $jp)
                            <option value="{{$jp->nama}}">{{$jp->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class="modal-footer" style="margin-top:5px;">
                <button type="button" id="btn-add" class="btn btn-primary">Add To List</button>
            </div>
        </form>
    </div>
</div>


    <div class="panel panel-primary">
        <div class="panel-heading">
                <h3 class="panel-title">#Device Information <span class="badge bg-red">#123</span>
                {{--  <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
                </a>  --}}
                </h3>
        </div>
            <div class="panel-body">
                <div class="device-info">
                    <div class="row">
                         <table class="table" id="tabl">
                        <thead>
                            <tr>
                                 <td>No </td>
                                <td>Serial Number</td>
                                <td>Warna</td>
                                <td>Merk</td>
                                <td>Garansi</td>
                                <td>Kelengkapan</td>
                                {{--  <td>Biaya</td>  --}}
                            </tr>
                            </thead>
                            <tbody>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</div>
{!! Form::close() !!}
@endsection


<script type="text/javascript" src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){
    $("#btn-add").click(function(){
        var _id = $('input[name=id]').length + 1;
        var _sn = $('input[name=sn]').val();
        var _warna = $('input[name=warna]').val();
        var _merk = $('select[name=merk]').val();
        var _garansi = $('select[name=garansi]').val();
        var _kelengkapan = $('select[name=kelengkapan]').val();

        var _tr = '<tr><td>'+_id+'</td> <td>'+_sn+'</td> <td>'+_warna+'</td> <td>'+_merk+'</td> <td>'+_garansi+'</td> <td>'+_kelengkapan+'</td></tr>';

        $('#tabl').append(_tr);
    });
});
</script>
<script>
$(document).ready(function(){
        $('.select2').select2()
})
</script>
