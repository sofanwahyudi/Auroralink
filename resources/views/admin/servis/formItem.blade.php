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
            {!! Form::open(['route' => ['servis.store'], 'method'=> 'POST', 'id'=>'myform']) !!}
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

            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">No</label>

                    <div class="col-md-9">
                        <input name="no" id="no" class="form-control" type="number" required="" readonly>
                        <span class="help-block"></span>
                    </div>
                </div>
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
                                <option value="{{$jp->id}}">{{$jp->name}}</option>
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
                                    <option value="{{$jp->id}}">{{$jp->nama}}</option>
                                    @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Kelengkapan</label>
                    <div class="col-md-9">
                        <select name="kelengkapan" id="kelengkapan[]" class="form-control select2" multiple="multiple" name="kelengkapan[]">
                            @foreach (\App\Model\Kelengkapan::all() as $jp)
                            <option value="{{$jp->id}}">{{$jp->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

    </div>
    <div class="modal-footer" style="margin:5px;">
        <button type="button" id="btn-add" class="btn btn-primary">Add To List</button>
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
                         <table class="table" id="data_table">
                        <thead>
                            <tr>
                                 <td>No </td>
                                <td>Serial Number</td>
                                <td>Warna</td>
                                <td>Merk</td>
                                <td>Garansi</td>
                                <td>Kelengkapan</td>
                                 <td>Aksi</td>
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
    var set_number = function(){
    var l = $('tr').length;
        for (i = 0; i < l; i++) {
        $('#no').val(i);
        }

    }
    set_number();


    var clear = function()
    {
        $('input[name=no]').val('');
        $('input[name=sn]').val('');
        $('input[name=warna]').val('');
        $('select[name=merk]').val('');
        $('select[name=garansi]').val('');
        $('select[name=kelengkapan]').val('');
    }

    $("#btn-add").click(function(){
    var _id = $('input[name=no]').val();
    var _sn = $('input[name=sn]').val();
    if(!_sn){
        document.getElementById("sn").focus();
        return swal("Ups.. Kamu belum memasukan SN");
    }
    var _warna = $('input[name=warna]').val();
    if(!_warna){
        document.getElementById("warna").focus();
        return swal("Ups.. Kamu belum memasukan WARNA");
    }
    var _merk = $('select[name=merk]').val();
    if(!_merk){
        document.getElementById("merk").focus();
        return swal("Ups.. Kamu belum memilih MERK");
    }
    var _garansi = $('select[name=garansi]').val();
    if(!_garansi){
        document.getElementById("garansi").focus();
        return swal("Ups.. Kamu belum memilih GARANSI");
    }
    var _kelengkapan = $('select[name=kelengkapan]').val();
    if(!_kelengkapan){
        document.getElementById("kelengkapan").focus();
        return swal("Ups.. Kamu belum memilih KELENGKAPAN");
    }

    var _tr = '<tr> <td>'+_id+'</td> <td>'+_sn+'</td> <td>'+_warna+'</td> <td>'+_merk+'</td> <td>'+_garansi+'</td> <td>'+_kelengkapan+'</td> <td><a type="button" class="btn-sm btn-warning btn-edit"><span class="fa fa-edit" style="color:white"></span></a>  <a type="button" class="btn-sm btn-danger btn-hapus"><span class="fa fa-trash" style="color:white"></span></a></td> </tr>';

    //DATA APPEND TO TABLE LIST
    $('#data_table').append(_tr);


    // DATA CLEAR
    clear();
    set_number().length+1;

    }
    );


    $(document).on('click', '.btn-edit', function(){
    var _tr = $(this).closest('tr');
    var _id = $(_tr).find('td:eq(0)').text();
    var _sn= $(_tr).find('td:eq(1)').text();
    var _warna = $(_tr).find('td:eq(2)').text();
    var _merk = $(_tr).find('td:eq(3)').text();
    var _garansi = $(_tr).find('td:eq(4)').text();
    var _kelengkapan = $(_tr).find('td:eq(5)').text();
    // var trid = $(this).closest('tr').find('td:eq(0)').text();


    $('input[name=no]').val(_id);
    $('input[name=sn]').val(_sn);
    $('input[name=warna]').val(_warna);
    $('select[name=merk]').val(_merk);
    $('select[name=garansi]').val(_garansi);
    $('select[name=kelengkapan]').val(_kelengkapan);

    //    alert(_id);
    });

    $(document).on('click', '.btn-hapus', function(){
    $(this).closest("tr").remove();
    clear();
    set_number().length-1;
    });

});
</script>
<script>
$(document).ready(function(){
        $('.select2').select2()
})
</script>




@extends('layouts.master')
@section('title')
Tambah Servis | Auroralink
@stop

@section('content')
<div class="form-box">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="badge bg-yellow">#Informasi Servis</span>
                <a href="{{route('pelanggan.create')}}" class="btn-sm btn-success modal-show" title="Tambah Data"><span class="fa fa-plus"></span> Tambah Data Pelanggan</a>
                </h3>
            </div>
            <div class="panel-body">
            {!! Form::open(['route' => ['servis.store'], 'method'=> 'POST', 'id'=>'myform']) !!}
                <div class="row">
                    <div class="col-md-3 required">
                        <div class="form-group">
                             <label for="">Nama Pelanggan</label>
                            <select id="pelanggan_id" class="form-control select2" name="pelanggan_id">
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
                <h3 class="panel-title"><span class="badge bg-red">#Informasi Unit</span>
                 <a href="#" class="btn-sm btn-success addRow"><span class="fa fa-plus"></span> Tambah Unit</a>
                </a>
                </h3>
        </div>
            <div class="panel-body">
                <div class="device-info">
                    <div class="row">
                         <table class="table" id="data_table">
                        <thead>
                            <tr>
                                <th>Merk</th>
                                <th>Garansi</th>
                                <th>Serial Number</th>
                                <th>Warna</th>
                                <th>Keluhan</th>
                                <th>Kelengkapan</th>
                                 {{--  <th>Aksi</th>  --}}
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select id="merk[]" class="form-control select2" name="merk">
                                        <option value="#">-- Pilih Merk --</option>
                                        @foreach (\App\Model\Merk::all() as $jp)
                                        <option value="{{$jp->id}}">{{$jp->name}}</option>
                                        @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="garansi" id="garansi[]" class="form-control select2" name="garansi_id[]">
                                            <option value="#">-- Pilih Garansi--</option>
                                            @foreach (\App\Model\Garansi::all() as $jp)
                                            <option value="{{$jp->id}}">{{$jp->nama}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input name="sn" id="sn[]" placeholder="Serial Number" class="form-control" type="text" required=""></td>
                                    <td><input name="warna" id="warna[]" placeholder="Warna" class="form-control" type="Warna" required=""></td>
                                    <td><input name="keluhan" id="keluhan[]" placeholder="Keluhan" class="form-control" type="text" required=""></td>
                                    <td>
                                        <select id="kelengkapan[]" class="form-control select2" multiple=true name="kelengkapan[]">
                                            @foreach (\App\Model\Kelengkapan::all() as $jp)
                                            <option value="{{$jp->id}}">{{$jp->nama}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    {{--  <td  style="text-align: center">
                                    <a href="#" class="btn btn-danger remove">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    </td>  --}}
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
<script type="text/javascript">
$(document).ready(function(){
    $('.addRow').on('click', function(){
        addRow();
    });
    function addRow()
    {
    var tr='<tr>'+
        '<td><select id="merk[]" class="form-control select2" name="merk[]"><option value="#">-- Pilih Merk --</option>@foreach (\App\Model\Merk::all() as $jp)<option value="{{$jp->id}}">{{$jp->name}}</option>@endforeach</select></td>'+
        '<td><select name="garansi[]" id="garansi[]" class="form-control select2" name="garansi_id[]"><option value="#">-- Pilih Garansi--</option>@foreach (\App\Model\Garansi::all() as $jp)<option value="{{$jp->id}}">{{$jp->nama}}</option>@endforeach</select></td>'+
        '<td><input name="sn[]" id="sn[]" placeholder="Serial Number" class="form-control" type="text" required=""></td>'+
        '<td><input name="warna[]" id="warna[]" placeholder="Warna" class="form-control" type="Warna" required=""></td>'+
        '<td><input name="keluhan[]" id="keluhan[]" placeholder="keluhan" class="form-control" type="text" required=""></td>'+
        '<td><select id="kelengkapan[]" class="form-control select2" multiple=true name="kelengkapan[]">@foreach (\App\Model\Kelengkapan::all() as $jp)<option value="{{$jp->id}}">{{$jp->nama}}</option>@endforeach</select></td>'+
        '<td><a href="#" class="btn btn-danger remove"><i class="fa fa-times"></i></a></td>'
        '</tr>';
        $('tbody').append(tr);
    };
    $('body').delegate('.remove','click', function(){
        $(this).parent().parent().remove();
    });
    $
})
</script>
<script>
$(document).ready(function(){
$('.select2').select2()
})
</script>

