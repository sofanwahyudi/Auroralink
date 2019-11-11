<!-- Ini awalan modal tambah -->
<div class="box box-warning">
<div  id="myAddModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-image:url('image/form.jpg'); background-repeat: no-repeat; background-position: right;">
                <div class="modal-header">
                        <div class="box box-warning">
                            <div class="modal-body">
                                <div class="box-body">
                                    {!! Form::open(['route' => ['tickets.store'], 'method'=> 'POST']) !!}
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label for="" class="control-label"></label>
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
