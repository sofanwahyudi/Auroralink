{!!Form::model($model, [
    'route' => $model->exists ? ['leads.update', $model->id] :'leads.store',
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
        <label for="" class="control-label">Telepon</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
            {!! Form::text('telepon', null, ['class' => 'form-control', 'id' => 'telepon', 'placeholder' => 'Masukan Telepon']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Email</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Masukan Email']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Komentar</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-commenting"></i></div>
            {!! Form::textarea('komentar', null, ['class' => 'form-control', 'id' => 'komentar', 'placeholder' => 'Masukan Komentar Anda']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
