@extends('layouts.master')
@section('title')
Create Section | Auroralink
@stop
@section('content_header')
<h1>
    <span class="fa fa-edit"></span> Create Section
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Section</li>
  <li class="active">Create Section</li>
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
                'route' => 'sections.store',
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

            <div class="form-group {{ $errors->has('sub_title') ? 'has-error' : ''}}">
                {!! Form::label('sub_title') !!}
                {!! Form::text('sub_title', null, ['class'=>'form-control']) !!}
                @if($errors->has('sub_title'))
                    <span class="badge badge-danger">{{ $errors->first('sub_title') }}</span>
                @endif
            </div>

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
          <h3 class="card-title"> Gambar</h3>
        </div>

      </div>
      <!-- /.card -->

      <div class="card card-default">
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

      <div class="card-footer">
        <div class="pull-right">
          {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
        </div>
        <div class="pull-left">
            <a id="draft-btn" href="#" class="btn btn-default">Save Draft</a>
        </div>
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

