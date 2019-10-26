{!!Form::model($model, [
    'route' => $model->exists ? ['categories.update', $model->id] :'categories.store',
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
            {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'id' => 'keterangan', 'placeholder' => 'Masukan Keterangan']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Biaya</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::text('biaya', null, ['class' => 'form-control', 'id' => 'biaya', 'placeholder' => 'Masukan Biaya']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('keterangan')
    //bootstrap WYSIHTML5 - text editor
    //$('.textarea').wysihtml5()
  })
</script>
