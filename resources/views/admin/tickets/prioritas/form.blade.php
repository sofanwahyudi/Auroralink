{!!Form::model($model, [
    'route' => $model->exists ? ['prioritas.update', $model->id] :'prioritas.store',
    'method' => $model->exists ? 'PUT':'POST',
    'files' => true,
])!!}
<div class="box-body">
    <div class="form-group col-md-6">
        <label for="" class="control-label">Nama</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Biaya</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::text('color', null, ['class' => 'form-control', 'id' => 'biaya', 'placeholder' => 'Masukan Warna']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
