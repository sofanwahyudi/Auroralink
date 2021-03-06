@extends('layouts.master')
@section('title')
Create Post | Auroralink
@stop
@section('content_header')
<h1>
    <span class="fa fa-edit"></span> Create Post
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Post</li>
  <li class="active">Create Post</li>
</ol>
@endsection

@section('content')
    <!-- Main content -->
    <div class="box box-warning">
        @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
        @endif
        <div class="box-header with-border">
	    <section class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="col-md-9">
                {!!Form::model($model, [
                    'route' => 'post.store',
                    'method' => 'POST',
                    'files' => true
                ])!!}
	            <div class="card">
				<div class="card-body p-1">
				<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
					{!! Form::label('title') !!}
					{!! Form::text('title', null, ['class'=>'form-control']) !!}
					@if($errors->has('title'))
						<span class="badge badge-danger">{{ $errors->first('title') }}</span>
					@endif
				</div>

				{{--  <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
					{!! Form::label('slug') !!}
					{!! Form::text('slug', null, ['class'=>'form-control']) !!}
					@if($errors->has('slug'))
						<span class="badge badge-danger">{{ $errors->first('slug') }}</span>
					@endif
				</div>  --}}

				<div class="form-group">
                    <label for="" class="control-label">Content</label>
                    <div class="input-group">
                        {!! Form::textarea('content', null, ['placeholder' => 'type here text', 'id' => 'content', 'class' => 'content']) !!}
                        <input name="image" type="file" id="upload" class="hidden" onchange="">
                    </div>
                </div>
				</div>
				<div class="card-footer clearfix">

				</div>

        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-3">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title"> Publish</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                  <div class="form-group {{ $errors->has('published_at') ? 'has-error' : ''}}">
				  {!! Form::label('published_at','Published Date') !!}

				  <div class='input-group date'>
                      {!! Form::text('published_at', null, ['class'=> 'form-control','placeholder' => 'Y-m-d H:i:s', 'id'=>'datepicker']) !!}
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
				  @if($errors->has('published_at'))
				  <span class="label label-danger help-block">{{ $errors->first('published_at') }}</span>
				  @endif
				</div>
              </div>
            </div>
            <div class="card-footer">
                <div class="pull-right">
                  {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
                </div>
                <div class="pull-left">
                	<a id="draft-btn" href="#" class="btn btn-default">Save Draft</a>
                </div>
            </div>
          </div>
          <!-- /.card -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title"> Category</h3>
            </div>
            <div class="card-body">
				<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
					<select id="category_id" class="form-control select2" name="category_id">
                        <option value="#">-- Pilih Kategori --</option>
                        @foreach (\App\Model\Category::all() as $jp)
                        <option value="{{$jp->id}}" {{ ( $jp->id == $model->kategori['id']) ? 'selected' : '' }}>{{$jp->category}}</option>
                        @endforeach
                    </select>
					@if($errors->has('category_id'))
						<span class="badge badge-danger">{{ $errors->first('category_id') }}</span>
					@endif
				</div>
            </div>
          </div>
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title"> Tags</h3>
            </div>
            <div class="card-body">
				<div class="form-group {{ $errors->has('tags[]') ? 'has-error' : ''}}">
					<select id="tags[]" class="form-control select3" name="tags[]">
                        @foreach (\App\Model\Tags::all() as $jp)
                        <option value="{{$jp->id}}" {{ ( $jp == $model->tags()) ? 'selected' : '' }}>{{$jp->tags}}</option>
                        @endforeach
                    </select>
					@if($errors->has('tags[]'))
						<span class="badge badge-danger">{{ $errors->first('tags[]') }}</span>
					@endif
				</div>
            </div>
          </div>
          <div class="card card-default">
            <div class="card-header with-border">
              <h3 class="card-title"> Featured Image</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-center">
              <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
              	<div class="fileinput fileinput-new" data-provides="fileinput">
              	  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
              	    <img src="http://placehold.it/200x150&text=No+Image" alt="...">
              	  </div>
              	  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
              	  <div>
              	    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
              	    {!! Form::file('image') !!}
              		</span>
              	    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
              	  </div>
              	</div>

              	@if($errors->has('image'))
              		<span class="badge badge-danger">{{ $errors->first('image') }}</span>
              	@endif
              </div>
            </div>
              <!-- /.card-body -->
          </div>
      </div>
      <!-- right column -->
		{!! Form::close() !!}
	  </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
    </div>
</div>
@endsection

