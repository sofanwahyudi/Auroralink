{!!Form::model($model, [
    'route' => $model->exists ? ['jam.update', $model->id] :'jam.store',
    'method' => $model->exists ? 'PUT':'POST',
])!!}
<div class="box-body">
    <div class="form-group col-md-6">
        <label for="" class="control-label">Nama</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Jam Buka</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::time('jam_start', null, ['class' => 'form-control', 'id' => 'jam_start', 'placeholder' => 'Masukan Jam Mulai']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Jam Tutup</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::time('jam_end', null, ['class' => 'form-control', 'id' => 'jam_end', 'placeholder' => 'Masukan Jam Selesai']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
