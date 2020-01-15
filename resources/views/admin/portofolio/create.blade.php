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
  <li class="active">Create Jasa</li>
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
                    'route' => 'jasa.store',
                    'method' => 'POST',
                    'files' => true
                ])!!}
	            <div class="box-body">
                    <div class="form-group">
                        <label for="" class="control-label">Nama</label>
                        <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Harga</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                            {!! Form::text('harga', null, ['class' => 'form-control', 'id' => 'harga', 'placeholder' => 'Masukan Harga']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-6 required ">
                    <label for="name" class="control-label">Jam Support</label>
                        <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                        <select id="jam_id" class="form-control select2" name="jam_id">
                            <option value="#">-- Pilih Jam --</option>
                            @foreach (\App\Model\Jam::all() as $jp)
                            <option value="{{$jp->id}}" {{ ( $jp->id == $model->jam['id']) ? 'selected' : '' }}>{{$jp->nama}} - {{$jp->jam_start}} s/d {{$jp->jam_end}} </option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                    <div class="form-group col-md-6 required ">
                    <label for="name" class="control-label">Kategori Jasa</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                            <select id="job_id" class="form-control select2" name="job_id">
                                <option value="#">-- Pilih Kategori Jasa--</option>
                                @foreach (\App\Model\Job::all() as $jp)
                                <option value="{{$jp->id}}" {{ ( $jp->id == $model->job['id']) ? 'selected' : '' }}>{{$jp->nama}}</option>
                                @endforeach
                            </select>
                            </div>
                    </div>
                    <div class="form-group col-md-6 required " enctype="multipart/form-data">
                    <label for="name" class="control-label">Gambar <i> (ukuran gambar maksimal adalah 300 X 200)</i></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-image"></i></div>
                            {{-- <input class="form-control" placeholder="Upload Gambar Part" required="required" name="gambar" type="file" id="gambar" enctype="multipart/form-data"> --}}
                            {!! Form::file('gambar') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Deskripsi</label>
                        <div class="input-group">
                            {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'id' => 'deskripsi', 'placeholder' => 'Masukan Deskripsi']) !!}
                        </div>
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
                            {!! Form::textarea('fitur', null, ['class' => 'form-control', 'id' => 'fitur', 'placeholder' => 'Masukan Deskripsi']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Benefit</label>
                        <div class="input-group">
                            {!! Form::textarea('benefit', null, ['class' => 'form-control', 'id' => 'benefit', 'placeholder' => 'Masukan Deskripsi']) !!}
                        </div>
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

