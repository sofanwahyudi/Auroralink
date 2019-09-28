{!!Form::model($model, [
    'route' => $model->exists ? ['devisi.update', $model->id] :'devisi.store',
    'method' => $model->exists ? 'PUT':'POST',
])!!}
<div class="box-body">
    <div class="form-group col-md-6">
        <label for="" class="control-label">Nama</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Masukan Nama']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Keterangan</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::text('keterangan', null, ['class' => 'form-control', 'id' => 'keterangan', 'placeholder' => 'Masukan Keterangan']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
