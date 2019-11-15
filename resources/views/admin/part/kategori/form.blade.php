{!!Form::model($model, [
    'route' => $model->exists ? ['kategori.update', $model->id] :'kategori.store',
    'method' => $model->exists ? 'PUT':'POST',
])!!}
<div class="box-body">
    <div class="form-group">
        <label for="" class="control-label">Nama</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Deskripsi</label>
        <div class="input-group">
            {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'id' => 'deskripsi', 'placeholder' => 'Masukan Deskripsi']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}

