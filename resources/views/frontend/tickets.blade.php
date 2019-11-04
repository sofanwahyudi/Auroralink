@extends('frontend.base.layout')

@section('title')
    Open Tickets
@stop

@section('hero')
<section id="hero" class="wow fadeIn" style="margin-top:165px; margin-left:45px;">
    <div class="pull-left container">
    <div class="pull-right">
<img src="image/dis.png" alt="Hero Imgs">
    </div>
    <div class="col-md-6">
      <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-get-started scrollto"><span class="fa fa-ticket"> Open Ticket </span></a>
      <p>Klik Open Ticket dan silahkan isikan data sesuai kolom</p>
      </div>
      </div>
<!-- Ini awalan modal tambah -->
<div class="box box-warning">
<div  id="myAddModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <img src="image/dis.png" alt="Hero Imgs">
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
                            <div class="modal-body">
                                <div class="box-body">
                                    {!! Form::open() !!}
                                        <div class="form-group">
                                            <label for="" class="control-label">Title</label>
                                            <div class="input-group">
                                                {{--  <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>  --}}
                                                {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'rows' => '5', 'placeholder' => 'Masukan Nama']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Telepon</label>
                                            <div class="input-group">
                                                {{--  <div class="input-group-addon"><i class="fa fa-phone"></i></div>  --}}
                                                <select id="category_id" class="form-control select" name="category_id">
                                                    <option value="#">-- Pilih Kategori --</option>
                                                    @foreach (\App\Model\Category::all() as $jp)
                                                    <option value="{{$jp->id}}">{{$jp->category}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Email</label>
                                            <div class="input-group">
                                                {{--  <div class="input-group-addon"><i class="fa fa-envelope"></i></div>  --}}
                                                {!! Form::file('image') !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {{--  <label for="" class="control-label">Komentar</label>  --}}
                                            <div class="input-group">
                                                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Enter Your Comment Here....']) !!}
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Send Ticket</button>
                                        </div>
                                    {!! Form::close() !!}
                                <!-- End Form -->
                                </div><!-- box-body-->
                            </div><!-- modal-body-->
                        </div><!-- box-warning-->
                </div><!--md-header-->
            </div><!--md-content-->
        </div><!--md-dialog-->
    </div><!--mydetailmodal-->
    <!-- Ini akhiran modal tambah -->
</section>

@stop
