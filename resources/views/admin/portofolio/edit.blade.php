@extends('layouts.master')
@section('title')
Edit Portofolio | Auroralink
@stop
@section('content_header')
<h1>
    <span class="fa fa-edit"></span> Edit Portofolio
</h1>
<a href="{{route('jasas')}}"><i class="fa fa-arrow-left"></i> Back To List Post</a>

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
                {!! Form::model($model, ['action' => ['JasaController@update', $model->id], 'method' => 'PUT']) !!}
	            <div class="card">
				<div class="card-body p-1">
				<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
					{!! Form::label('nama') !!}
					{!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
				</div>

				<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : ''}}">
					{!! Form::label('deskripsi') !!}
					{!! Form::text('deskripsi', null, ['class' => 'form-control', 'id' => 'deskripsi', 'placeholder' => 'Masukan Deskripsi']) !!}
				</div>
                <div class="form-group">
                    <label for="" class="control-label">Content</label>
                    <div class="input-group">
                        {!! Form::textarea('content', null, ['placeholder' => 'type here text', 'id' => 'content', 'class' => 'content']) !!}
                        <input name="image" type="file" id="upload" class="hidden" onchange="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="control-label">Fitur</label>
                    <div class="input-group">
                        {!! Form::textarea('fitur', null, ['placeholder' => 'type here text', 'id' => 'fitur', 'class' => 'fitur']) !!}
                        <input name="image" type="file" id="upload" class="hidden" onchange="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="control-label">Benefit</label>
                    <div class="input-group">
                        {!! Form::textarea('benefit', null, ['placeholder' => 'type here text', 'id' => 'benefit', 'class' => 'benefit']) !!}
                        <input name="image" type="file" id="upload" class="hidden" onchange="">
                    </div>
                </div>

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
				  {!! Form::label('harga','harga') !!}

				  <div class='input-group date'>
                    {!! Form::text('harga', null, ['class' => 'form-control', 'id' => 'harga', 'placeholder' => 'Masukan Harga']) !!}
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-tag"></span>
                      </span>
                  </div>
				</div>
              </div>
              <div class="form-group">
                <div class="form-group {{ $errors->has('published_at') ? 'has-error' : ''}}">
                {!! Form::label('jam','jam') !!}

                <div class='input-group date'>
                    <select id="jam_id" class="form-control select2" name="jam_id">
                        <option value="#">-- Pilih Jam --</option>
                        @foreach (\App\Model\Jam::all() as $jp)
                        <option value="{{$jp->id}}" {{ ( $jp->id == $model->jam['id']) ? 'selected' : '' }}>{{$jp->nama}} - {{$jp->jam_start}} s/d {{$jp->jam_end}} </option>
                        @endforeach
                    </select>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
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
					<select id="job_id" class="form-control select2" name="job_id">
                        <option value="#">-- Pilih Kategori --</option>
                        @foreach (\App\Model\Job::all() as $jp)
                        <option value="{{$jp->id}}" {{ ( $jp->id == $model->job['id']) ? 'selected' : '' }}>{{$jp->nama}}</option>
                        @endforeach
                    </select>
				</div>
            </div>
          </div>
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title"> Team</h3>
            </div>
            <div class="card-body">
				<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
					<select id="team_id" class="form-control select2" name="team_id">
                        <option value="#">-- Pilih Team --</option>
                        @foreach (\App\Model\Team::all() as $jp)
                        <option value="{{$jp->id}}" {{ ( $jp->id == $model->team['id']) ? 'selected' : '' }}>{{$jp->nama}}</option>
                        @endforeach
                    </select>
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

