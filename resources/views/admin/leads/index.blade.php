@extends('layouts.master')
@section('title')
Leads | Auroralink
@stop
@section('content_header')
    <h1>
        <span class="fa fa-send-o"></span> Leads
        <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
        <a href="#" data-url="" class="btn-sm btn-danger delete-all"><span class="fa fa-trash"></span> Hapus Data Terpilih</a>
    {{-- <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Delete All</button> --}}
    </h1>
    <ol class="breadcrumb">
    <li>
    <a href="{{ route('export_Leads_xls') }}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file-excel-o" style="color:white"></span> Export Excel</a>
    <a href="{{ route('export_Leads_csv') }}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file" style="color:white"></span> Export Csv</a>
    </li>
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Leads</li>
    </ol>
@endsection
@section('content')
    <div class="box box-warning">
        <div class="box-header with-border">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div><br />
          @endif
          @if(Session::has('success'))
            <div class="alert alert-success">
            <strong>Success: </strong>{{ Session::get('success') }}
            </div>
            @endif
            <!-- Ini awalan modal tambah -->
            <div  id="myAddModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Tambah Supplier <span style="margin: 19px;"></h3>
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
                                        </div><br />
                                      @endif
                                    <div class="modal-body">
                                        <div class="box-body">

                                         <!-- Start Form -->
                                         <form method="POST" action="{{ route('leads.store') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group col-md-6 required ">
                                        <label for="name" class="control-label">Nama</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                                <input class="form-control" placeholder="Masukkan Nama" required="required" name="nama" type="text" id="nama">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 required ">
                                        <label for="name" class="control-label">Telepon</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                <input class="form-control" placeholder="Masukkan Telepon" required="required" name="telepon" type="text" id="telepon">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 required ">
                                        <label for="name" class="control-label">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                <input class="form-control" placeholder="Masukkan Email" required="required" name="email" type="email" id="email">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 required ">
                                        <label for="name" class="control-label">Komentar</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                                                <input class="form-control" placeholder="Masukkan komentar anda required="required" name="komentar" type="text" id="komentar">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <!-- box-footer -->
                                    <div class="box-footer">
                                    <div class="col-md-12">
                                        <div class="form-group no-margin">
                                        <button type="submit" class="btn btn-success  button-submit" data-loading-text="Sedang memuat..."><span class="fa fa-save"></span> &nbsp;Simpan</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- /.box-footer -->
                                    </form>
                                    <!-- End Form -->
                                        </div><!-- box-body-->
                                    </div><!-- modal-body-->
                                </div><!-- box-warning-->
                        </div><!--md-header-->
                    </div><!--md-content-->
                </div><!--md-dialog-->
            </div><!--mydetailmodal-->
            <!-- Ini akhiran modal tambah -->


            <table id="datatable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc"> <input type="checkbox" id="check_all"></th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Telepon</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Komentar</th>
                </thead>
                <tbody>
                        @if($data->count())
                        @foreach($data as $key => $jn)
                        <tr>
                            <td><input type="checkbox" class="checkbox" data-id="{{$jn->id}}"></td>
                            <td>{{$key+1}}</td>
                            <td>{{$jn->nama}}</td>
                            <td>{{$jn->telepon}}</td>
                            <td>{{$jn->email}}</td>
                            <td>{{$jn->komentar}}</td>
                        </tr>
                        @endforeach
                        @endif
                </tbody>
        </table>
        </div>
    </div>
@endsection
<script type="text/javascript" src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>

<script>
$(document).ready(function(){
    $('#datatable').DataTable(
    // {
    // processing: true,
    // serverSide: true,
    // ajax: 'supplier/json',
    // columns: [
    //     { data: 'id', name: 'id' },
    //     { data: 'nama', name: 'nama' },
    //     { data: 'email', name: 'email' },
    //     { data: 'created_at', name: 'created_at' },
    //     { data: 'updated_at', name: 'updated_at' }
    // ]
    // }
    );
$('#check_all').on('click', function(e) {
if($(this).is(':checked',true))
{
    $(".checkbox").prop('checked', true);
    } else {
        $(".checkbox").prop('checked',false);
        }
        });
        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#check_all').prop('checked',true);
                }else{
                    $('#check_all').prop('checked',false);
                    }
                    });
                    $('.delete-all').on('click', function(e) {
                        var idsArr = [];
                        $(".checkbox:checked").each(function() {
                            idsArr.push($(this).attr('data-id'));
                            });
                            if(idsArr.length <=0)
                            {
                                swal("Anda Belum Memilih Apapun!", "Apanya Yang Mau Di Hapus?");
                                }  else {
                                    if(confirm("Anda Yakin, Akan Menghapus Data Terpilih?")){
                                        var strIds = idsArr.join(",");
$.ajax({
    url: "{{ route('leads.multiple-delete') }}",
    type: 'POST',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    data: 'ids='+strIds,
    success: function (data) {
        window.location.href = "leads";
        if (data['success']) {
                                $(".checkbox:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                swal(data['success']);
                            } else if (data['error']) {
                                swal(data['error']);
                            } else {
                                swal('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });

                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }
            }
        });

        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();

            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    window.location.href = "supplier";
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    swal(data.responseText);
                }
            });
            return false;
        });
});
</script>

