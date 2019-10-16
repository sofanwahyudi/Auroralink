{!!Form::model($model, [
    'route' => $model->exists ? ['postkategori.update', $model->id] :'postkategori.store',
    'method' => $model->exists ? 'PUT':'POST',
])!!}
<div class="box-body">
    <div class="form-group col-md-6">
        <label for="" class="control-label">Tags</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('category', null, ['class' => 'form-control', 'id' => 'category', 'placeholder' => 'Masukan Kategori']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
