{!!Form::model($model, [
    'route' => $model->exists ? ['sections.update', $model->id] :'sections.store',
    'method' => $model->exists ? 'PUT':'POST',
    'files' => true,
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
        <label for="" class="control-label">Sub Title</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::text('sub_title', null, ['class' => 'form-control', 'id' => 'sub_title', 'placeholder' => 'Masukan sub_title']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Content</label>
        <div class="input-group">
            <textarea class="textarea form" id="content" name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div>
    </div>
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Gambar <i> (ukuran gambar maksimal adalah 300 X 200)</i></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-image"></i></div>
            {!! Form::file('image') !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>
$('.textarea').wysihtml5()
</script>
