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
    <div class="form-group col-md-9">
        <label for="" class="control-label">Komentar</label>
        <div class="input-group">
            {{-- <textarea class="textarea form" id="textarea" name="komentar" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> --}}
            {!! Form::textarea('komentar', null,['class'=>'form-control', 'id' => 'editor1', 'placeholder' => 'Masukan Komentar']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
      //bootstrap WYSIHTML5 - text editor
     // $('.textarea').wysihtml5()
    })
  </script>

