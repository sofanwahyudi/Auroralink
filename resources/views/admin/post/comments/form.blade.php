{!!Form::model($model, [
    'route' => $model->exists ? ['comments.update', $model->id] :'comments.store',
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
        <label for="" class="control-label">Email</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Masukan Email']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Komentar</label>
        <div class="input-group">
            {!! Form::textarea('body', null, ['placeholder' => 'type here text', 'class' => 'ckeditor', 'style' => "width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"]) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>
CKEDITOR.replace("content", options, content);
</script>
