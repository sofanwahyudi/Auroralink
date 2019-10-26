{!!Form::model($model, [
    'route' => $model->exists ? ['post.update', $model->id] :'post.store',
    'method' => $model->exists ? 'PUT':'POST',
    'files' => true
])!!}

<div class="box-body">
    <div class="form-group">
        <label for="" class="control-label">Title</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Masukan Title']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Content</label>
        <div class="input-group">
            <div class="box-body pad">
                {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content', 'placeholder' => 'Masukan Konten']) !!}
            </div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Slug</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug', 'placeholder' => 'Masukan Slug']) !!}
        </div>
    </div>
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Kategori</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="category_id" class="form-control select" name="category_id">
            <option value="#">-- Pilih Kategori --</option>
            @foreach (\App\Model\Category::all() as $jp)
            <option value="{{$jp->id}}" {{ ( $jp->id == $model->kategori['id']) ? 'selected' : '' }}>{{$jp->category}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Gambar <i> (ukuran gambar maksimal adalah 300 X 200)</i></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-image"></i></div>
            <input type="file" class="form-control" name="image" id="image" {{ $errors->has('image') ? 'class=has-error' : '' }} value="{{ $model->image }}">
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Tags</label>
        <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-tags"></i></div>
       <select id="tags[]" class="form-control select2" name="tags[]">
            @foreach (\App\Model\Tags::all() as $jp)
            <option value="{{$jp->id}}" {{ ( $jp == $model->tags()) ? 'selected' : '' }}>{{$jp->tags}}</option>
            @endforeach
        </select>
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('content')
    //bootstrap WYSIHTML5 - text editor
    //$('.textarea').wysihtml5()
  })
</script>
<script>
$('.select2').select2();
$('.select2').select2({
    tags: true,
    multiple: true,
    tokenSeparators: [',']
});
</script>
