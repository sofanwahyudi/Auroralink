{{--
<!-- Add Customer Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Devices</h4>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id"/>
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">Merk</label>
                    <div class="col-md-9">
                        <select id="merk_id" class="form-control select" name="merk_id">
                                <option value="#">-- Pilih Merk --</option>
                                @foreach ($item as $jp)
                                <option value="{{$jp->id}}">{{$jp->name}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Serial Number</label>
                    <div class="col-md-9">
                        <input name="text" placeholder="Serial Number" class="form-control" type="text" required="">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Warna</label>
                    <div class="col-md-9">
                        <input name="text" placeholder="Warna" class="form-control" type="Warna" required="">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Warna</label>
                    <div class="col-md-9">
                        <input name="text" placeholder="Warna" class="form-control" type="Warna" required="">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Garansi</label>
                    <div class="col-md-9">
                        <select id="garansi_id" class="form-control select" name="garansi_id">
                                    <option value="#">-- Pilih Model --</option>
                                    @foreach (\App\Model\Garansi::all() as $jp)
                                    <option value="{{$jp->id}}">{{$jp->nama}}</option>
                                    @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Kelengkapan</label>
                    <div class="col-md-9">
                        <select id="kelengkapan[]" class="form-control select2" name="kelengkapan[]">
                            @foreach (\App\Model\Kelengkapan::all() as $jp)
                            <option value="{{$jp->id}}">{{$jp->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>
</div>
--}}
{!!Form::model($model, [
    'route' => $model->exists ? ['servis_item.update', $model->id] :'servis_item.store',
    'method' => $model->exists ? 'PUT':'POST',
    'files' => true
])!!}

<div class="box-body">
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Merk</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="merk_id" class="form-control select" name="merk_id">
            <option value="#">-- Pilih Merk --</option>
            @foreach (\App\Model\Merk::all() as $jp)
            <option value="{{$jp->id}}">{{$jp->name}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group col-md-6 required">
        <label for="" class="control-label">Serial Number</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('serial_number', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Masukan Title']) !!}
        </div>
    </div>
    <div class="form-group col-md-6 required">
        <label for="" class="control-label">Warna</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('warna', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Masukan Title']) !!}
        </div>
    </div>
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Garansi</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="garansi_id" class="form-control select" name="garansi_id">
            <option value="#">-- Pilih Garansi --</option>
            @foreach (\App\Model\Garansi::all() as $jp)
            <option value="{{$jp->id}}">{{$jp->nama}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group col-md-6 required ">
        <label for="name" class="control-label">Kelengkapan</label>
        <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-tags"></i></div>
            <select id="kelengkapan[]" class="form-control select2" name="kelengkapan[]">
                @foreach (\App\Model\Kelengkapan::all() as $jp)
                <option value="{{$jp->id}}">{{$jp->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>
$('.select2').select2();
$('.select2').select2({
    kelengkapan: true,
    multiple: true,
    tokenSeparators: [',']
});
</script>
