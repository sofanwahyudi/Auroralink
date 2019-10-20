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
            <textarea class="textarea form" id="content" name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
        <select id="category_id" class="form-control select2" name="category_id">
            <option value="#">-- Pilih Kategori --</option>
            @foreach (\App\Model\Category::all() as $jp)
            <option value="{{$jp->id}}">{{$jp->category}}</option>
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
                <label>Multiple</label>
                <select class="form-control select2" name="tags[]" multiple="multiple" data-placeholder="Masukan kata kunci"
                        style="width: 100%;">
            @foreach ($tags as $item)
                  <option value="{{ $item->id }}">{{ $item->tags }}</option>
            @endforeach
                </select>
              </div>
</div>
{{--  {!! Form::close() !!}  --}}
<script>
$('.textarea').wysihtml5()
$('.select2').select2();
</script>
