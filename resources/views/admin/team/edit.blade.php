@extends('layouts.master')
@section('title')
Edit Team | Auroralink
@stop
@section('content_header')
<h1>
    <span class="fa fa-edit"></span> Edit Team
</h1>
<a href="{{route('teams')}}"><i class="fa fa-arrow-left"></i> Back To List Team</a>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Team</li>
  <li class="active">Edit Team</li>
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
                {!! Form::model($model, ['action' => ['TeamController@update', $model->id], 'method' => 'PUT', 'files' => true]) !!}
	            <div class="box-body">
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Nama</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Alamat</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                            {!! Form::text('alamat', null, ['class' => 'form-control', 'id' => 'alamat', 'placeholder' => 'Masukan Alamat']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Email</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Masukan Email']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Telepon</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                            {!! Form::text('telepon', null, ['class' => 'form-control', 'id' => 'telepon', 'placeholder' => 'Masukan Telepon']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-6 required ">
                    <label for="name" class="control-label">Bagian</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                        <select id="devisi_id" class="form-control select2" name="devisi_id">
                            <option value="$model->devisi->id">-- Pilih Devisi --</option>
                            @foreach (\App\Model\Devisi::all() as $jp)
                            <option value="{{$jp->id}}" {{ ( $jp->id == $model->devisi['id']) ? 'selected' : '' }} >{{$jp->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6 required ">
                    <label for="name" class="control-label">Bagian</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                        <select id="bagian_id" class="form-control select2" name="bagian_id">
                            <option value="#">-- Pilih Bagian --</option>
                            @foreach (\App\Model\Bagian::all() as $b)
                                <option value="{{$b->id}}" {{ ( $b->id == $model->bagian['id']) ? 'selected' : '' }} >{{$b->nama}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6 required ">
                    <label for="name" class="control-label">User</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                        <select id="users_id" class="form-control select2" name="users_id">
                            <option value="#">-- Pilih User --</option>
                            @foreach (\App\User::all() as $jp)
                            <option value="{{$jp->id}}" {{ ( $jp->id == $model->users['id']) ? 'selected' : '' }}>{{$jp->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="card-body text-center">
                        <div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://placehold.it/200x150&text=No+foto" alt="...">
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                              <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select foto</span><span class="fileinput-exists">Change</span>
                                {!! Form::file('foto') !!}
                                </span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                              </div>
                            </div>

                            @if($errors->has('foto'))
                                <span class="badge badge-danger">{{ $errors->first('foto') }}</span>
                            @endif
                        </div>
                      </div>
                    </div>
                        <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="pull-left">
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

