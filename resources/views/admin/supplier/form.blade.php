{!!Form::model($model, [
    'route' => $model->exists ? ['supplier.update', $model->id] :'supplier.store',
    'method' => $model->exists ? 'PUT':'POST','delete',
])!!}
<div class="box-body">
    <div class="form-group col-md-6">
        <label for="" class="control-label">Nama</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'name']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Website</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-wordpress"></i></div>
            {!! Form::text('website', null, ['class' => 'form-control', 'id' => 'website']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Email</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
            {!! Form::Email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Telepon</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
            {!! Form::text('telepon', null, ['class' => 'form-control', 'id' => 'telepon']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Alamat</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-map"></i></div>
            {!! Form::text('alamat', null, ['class' => 'form-control', 'id' => 'alamat']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
