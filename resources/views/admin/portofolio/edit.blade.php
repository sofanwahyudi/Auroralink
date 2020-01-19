@extends('layouts.master')
@section('title')
Edit Portofolio | Auroralink
@stop
@section('content_header')
<h1>
    <span class="fa fa-edit"></span> Edit Portofolio
</h1>
<a href="{{route('portofolio')}}"><i class="fa fa-arrow-left"></i> Back To List Portofolio</a>

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Portofolio</li>
  <li class="active">Edit Portofolio</li>
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
                {{-- {!!Form::model($model, [
                    'route' => 'post.update',
                    'method' => 'PUT',
                    'files' => true,
                ])!!} --}}
                {!! Form::model($model, ['action' => ['PortofolioController@update', $model->id], 'method' => 'PUT', 'files' => true]) !!}
	            <div class="card">
                    <div class="card-body p-1">


                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        {!! Form::label('title') !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                        @if($errors->has('title'))
                            <span class="badge badge-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
                        {!! Form::label('Url') !!}
                        {!! Form::text('url', null, ['class'=>'form-control']) !!}
                        @if($errors->has('url'))
                            <span class="badge badge-danger">{{ $errors->first('url') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
                        {!! Form::label('Deskripsi') !!}
                        {!! Form::textarea('deskripsi', null, ['class'=>'form-control']) !!}
                        <input name="gambar" type="file" id="upload" class="hidden" onchange="">
                        @if($errors->has('deskripsi'))
                            <span class="badge badge-danger">{{ $errors->first('deskripsi') }}</span>
                        @endif
                    </div>


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
                  <div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                          <img src="http://placehold.it/200x150&text=No+gambar" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                        <div>
                          <span class="btn btn-default btn-file"><span class="fileinput-new">Select gambar</span><span class="fileinput-exists">Change</span>
                          {!! Form::file('gambar') !!}
                          </span>
                          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>

                      @if($errors->has('gambar'))
                          <span class="badge badge-danger">{{ $errors->first('gambar') }}</span>
                      @endif
                  </div>
                </div>
                  <!-- /.card-body -->
              </div>

              <div class="card-footer">
                <div class="pull-right">
                  {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
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

