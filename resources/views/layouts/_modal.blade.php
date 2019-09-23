<!-- Ini awalan modal tambah -->
<div  id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modal-header">
                <h3 class="modal-title" id="myModalLabel">Tambah Data <span style="margin: 19px;"></h3>
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
                            </div>
                          @endif
                        <div class="modal-body">
                            <div class="box-body">

                            </div><!-- box-body-->
                        </div><!-- modal-body-->
                    </div><!-- box-warning-->
            </div><!--md-header-->
        </div><!--md-content-->
    </div><!--md-dialog-->
</div><!--mydetailmodal-->
<!-- Ini akhiran modal tambah -->
