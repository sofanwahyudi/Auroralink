{!!Form::model($model, [
    'route' => $model->exists ? ['portofolio.update', $model->id] :'portofolio.store',
    'method' => $model->exists ? 'PUT':'POST',
])!!}
<div class="box-body">
    <div class="form-group ">
        <label for="" class="control-label">Title</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Masukan title']) !!}
        </div>
    </div>
    <div class="form-group ">
        <label for="" class="control-label">Deskripsi</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::text('deskripsi', null, ['class' => 'form-control', 'id' => 'deskripsi', 'placeholder' => 'Masukan deskripsi']) !!}
        </div>
    </div>
    <div class="form-group ">
        <label for="" class="control-label">Link</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-link"></i></div>
            {!! Form::text('url', null, ['class' => 'form-control', 'id' => 'url', 'placeholder' => 'Masukan Link']) !!}
        </div>
    </div>
    <div class="form-group col-md-6 required " enctype="multipart/form-data">
    <label for="name" class="control-label">Gambar <i> (ukuran gambar maksimal adalah 300 X 200)</i></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-image"></i></div>
            <input class="form-control" placeholder="Upload Gambar Part" required="required" name="gambar" type="file" id="gambar" enctype="multipart/form-data">
        </div>
    </div>
</div>
{!! Form::close() !!}
