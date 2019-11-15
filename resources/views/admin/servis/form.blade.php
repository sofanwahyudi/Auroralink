{!!Form::model($model, [
    'route' => $model->exists ? ['servis.update', $model->id] :'servis.store',
    'method' => $model->exists ? 'PUT':'POST',
])!!}
<div class="box-body">
    <div class="form-group col-md-6">
        <label for="" class="control-label">Noted</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::textarea('noted', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Keluhan</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::textarea('keluhan', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
