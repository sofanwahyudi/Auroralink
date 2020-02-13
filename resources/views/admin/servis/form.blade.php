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
                            <select id="user_id" class="form-control select2" name="user_id">
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
</div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</div>
{!! Form::close() !!}
@endsection

<script>
$(document).ready(function(){
        $('.select2').select2()
})
</script>
