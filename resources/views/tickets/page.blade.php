@extends('frontend.base.layout')

@section('title')
    Open Tickets
@stop

@section('hero')
<section id="hero" class="wow fadeIn" style="margin-top:165px;">
    <div class="badge">
        @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success">
        <strong>Ticket Added Successfully with no: </strong>{{ Session::get('success') }}
        </div>
        @endif
    </div>
    <div class="pull-left container">
        <div class="pull-right">
            <img src="image/dis.png" alt="Hero Imgs">
        </div>
        <div class="col-md-6">
            {{-- <div class="input-group input-group-sm">
                <input type="text" class="form-control" style="margin-right:5px; margin-bottom:10px;" placeholder="Put No. Ticket Here">
            </div> --}}
        <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-get-started scrollto" style="margin-left:15px;"><span class="fa fa-ticket"> Open Ticket </span></a>
        </div>
                <div class="row">

                    <div class="col-md-3">
                        <div class="badge" style="margin-left:5px;">
                                {{--  Nomor Tickets :<a href='{{url("/tickets/$tuc->slug")}}' title="Selengkapnya">{{ $tuc->no_ticket }}</a>
                                <br>Status Tickets : {{ $tuc->status['name'] }}  --}}
                                 <table class="table table-bordered">
                                    <tr>
                                        <td>No Tickets </td>
                                        <td>Status </td>
                                        <td>Kategori </td>
                                        <td>Prioritas </td>
                                    </tr>
                                    @foreach ($tic as $model)
                                    <tr>

                                        <td><a href='{{url("/tickets/$model->slug")}}'>{{ $model->no_ticket }}</a></td>
                                        <td><span class="badge badge-{{$model->status['color']}}">{{$model->status['name']}}</span></td>
                                        <td><span class="badge badge-{{$model->category['color']}}">{{ $model->category['name'] }}</span></td>
                                        <td><span class="badge badge-{{$model->priority['color']}}">{{ $model->priority['name'] }}</span></td>

                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                    </div>

                </div>

                            {{--  @forelse ($tic as $tuc)
                <div class="row">
                    <div class="col-md-3">
                        <div class="badge" style="margin-left:5px;">
                            <div class="alert alert-success">
                            <span class="fa fa-info-circle"> My Ticket </span>
                                            <p> No. Tickets : {{ $tuc->no_ticket }}
                                            <br>Status : {{ $tuc->status['name'] }}
                                            <br><span class="post-read-more"><a href='{{url("/tickets/$tuc->slug")}}' title="Selengkapnya">Read More &raquo;</a></span>
                                            </p>
                                            @empty
                                            <p><span class="w3-tag w3-green"> Nothing Tickets</span></p>

                            </div>
                    </div>
                </div>
                @endforelse  --}}
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
                            <div class="modal-body">
                                <div class="box-body">
                                    {!! Form::open(['route' => ['tickets.store'], 'method'=> 'POST']) !!}
                                        <div class="form-group">
                                            <label for="" class="control-label">Subject</label>
                                            <div class="input-group">
                                                {{--  <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>  --}}
                                                {!! Form::text('subject', null, ['class' => 'form-control', 'id' => 'subject', 'rows' => '5', 'placeholder' => 'Enter Subject']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label"></label>
                                            <div class="input-group">
                                                {{--  <div class="input-group-addon"><i class="fa fa-phone"></i></div>  --}}
                                                <select id="priority_id" class="form-control select" name="priority_id">
                                                    <option value="#">-- Select Priority --</option>
                                                    @foreach (\App\Model\Tickets\Priority::all() as $jp)
                                                    <option value="{{$jp->id}}" >{{$jp->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label"></label>
                                            <div class="input-group">
                                                {{--  <div class="input-group-addon"><i class="fa fa-phone"></i></div>  --}}
                                                <select id="cats_id" class="form-control select" name="cats_id">
                                                    <option value="#">-- Select Categories --</option>
                                                    @foreach (\App\Model\Tickets\Cats::all() as $jp)
                                                    <option value="{{$jp->id}}" >{{$jp->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {{--  <label for="" class="control-label">Komentar</label>  --}}
                                            <div class="input-group">
                                                {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '5','class' => 'textarea', 'placeholder' => 'Enter Your Description Here....']) !!}
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
{{-- <script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script src="{{url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<link rel="stylesheet" href="{{url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}"> --}}
