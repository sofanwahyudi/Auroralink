        {!!Form::model($model, [
            'route' => $model->exists ? ['devisi.update', $model->id] :'devisi.store',
            'method' => $model->exists ? 'PUT':'POST',
        ])!!}
        <div class="box-body">
            <div class="form-group">
                <label for="" class="control-label">Nama</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Masukan Nama']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label">Keterangan</label>
                <div class="input-group">
                    {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'id' => 'keterangan', 'placeholder' => 'Masukan Keterangan']) !!}
                </div>
            </div>
            {{--  <div class="form-group">
                <label for="bagian" class="control-label"><span class="fa fa-user"></span>  Bagian </label>
            <div class="form-check">
                @foreach(\App\Model\Bagian::all()  as $r)
                <div class="col-sm-6">
                {{ Form::checkbox('bagian_id', $r->id, $model->bagian($r->id) ? false : true) }}
                {{  $r->nama }}
                </div>
                @endforeach
            </div>
            </div>  --}}
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
