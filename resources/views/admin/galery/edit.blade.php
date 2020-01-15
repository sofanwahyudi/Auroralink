@extends('layouts.master')
@section('title')
Edit Portofolio | Auroralink
@stop
@section('content_header')
<h1>
    <span class="fa fa-edit"></span> Edit Portofolio
</h1>
<a href="{{route('galery')}}"><i class="fa fa-arrow-left"></i> Back To List Post</a>

<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Jasa</a></li>
  <li>Jasa</li>
  <li class="active">Edit jasa</li>
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
                        {!! Form::model($model, ['action' => ['GaleryController@update', $model->id], 'method' => 'PUT', 'files' => true]) !!}
                      <div class="box-body">
                          <div class="form-group col-md-6">
                              <label for="" class="control-label">Title</label>
                              <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                      {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Masukan title']) !!}
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <label for="" class="control-label">Deskripsi</label>
                              <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                  {!! Form::text('deskripsi', null, ['class' => 'form-control', 'id' => 'deskripsi', 'placeholder' => 'Masukan deskripsi']) !!}
                              </div>
                          </div>
                          <div class="form-group col-md-6 required ">
                          <label for="name" class="control-label">Jam Support</label>
                              <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                              {!! Form::text('url', null, ['class' => 'form-control', 'id' => 'url', 'placeholder' => 'Masukan Link']) !!}
                              </div>
                              </div>
                          <div class="form-group col-md-6 required ">
                          <label for="name" class="control-label">Kategori Jasa</label>
                              <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                  <select id="job_id" class="form-control select2" name="job_id">
                                      <option value="#">-- Pilih Kategori Jasa--</option>
                                      @foreach ($job as $jp)
                                      <option value="{{$jp->id}}" {{ ( $jp->id == $model->job['id']) ? 'selected' : '' }}>{{$jp->nama}}</option>
                                      @endforeach
                                  </select>
                                  </div>
                          </div>
                          <div class="form-group {{ $errors->has('gambar') ? 'has-error' : ''}}">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://placehold.it/200x150&text=No+Image" alt="...">
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                              <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
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
                      <div class="card-footer">
                          <div class="pull-right">
                            {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                          </div>
                      </div>
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

