@extends('layouts.master')
@section('title')
    Supplier | Auroralink
@endsection
@section('content_header')
    <h1>
        <span class="fa fa-user"></span> Supplier
        <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
        <a href="#" data-url="" class="btn-sm btn-danger delete-all"><span class="fa fa-trash"></span> Hapus Data Terpilih</a>
    {{-- <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Delete All</button> --}}
    </h1>
    <ol class="breadcrumb">
    <li>
            <a href="{{ route('exporte') }}" class="btn-sm btn-success"><span class="fa fa-file-excel-o"></span> Export Excel</a>
            <a href="{{ route('exports') }}" class="btn-sm btn-success"><span class="fa fa-file"></span> Export Csv</a>
    </li>
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Supplier</li>
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
                                            <button type="button" class="close" data-dismiss="alert">×</button>
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
                                         <form method="POST" action="{{ route('supplier.store') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group col-md-6 required ">
                                        <label for="name" class="control-label">Nama</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                                <input class="form-control" placeholder="Masukkan Nama Supplier" required="required" name="nama" type="text" id="nama">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 required ">
                                        <label for="name" class="control-label">Alamat</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                                                <input class="form-control" placeholder="Masukkan Alamat Kantor" required="required" name="alamat" type="text" id="alamat">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 required ">
                                        <label for="name" class="control-label">Telepon</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                <input class="form-control" placeholder="Masukkan Telepon Supplier" required="required" name="telepon" type="text" id="telepon">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 required ">
                                        <label for="name" class="control-label">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                <input class="form-control" placeholder="Masukkan Email Supplier" required="required" name="email" type="email" id="email">
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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Alamat</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Telepon</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>
                        @if($supplier->count())
                        @foreach($supplier as $key => $jn)
                        <tr>
                            <td><input type="checkbox" class="checkbox" data-id="{{$jn->id}}"></td>
                            <td>{{$key+1}}</td>
                            <td>{{$jn->nama}}</td>
                            <td>{{$jn->alamat}}</td>
                            <td>{{$jn->telepon}}</td>
                            <td>{{$jn->email}}</td>
                            <td>{{$jn->status}}</td>
                            <td>
                                    <a href="#" data-toggle="modal" data-target="#myDetailModal{{ $jn->id }}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myEditModal{{ $jn->id }}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myHapusModal{{ $jn->id }}" class="btn-sm btn-danger"><span class="fa fa-trash"></span></a>

                            <!-- Ini awalan modal detail -->
                            <div  id="myDetailModal{{$jn->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Detail Supplier <strong>{{$jn->name}}</strong> Kode : {{$jn->kode_supplier}} <span style="margin: 19px;"></h3>
                                                <div class="box box-warning">
                                                        <div class="text-center"><img src="{{asset('image/'.$jn->logo)}}" style="width:300px;padding:10px;height:100px;margin-top:10px";><br><br></div><!--text-center -->
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td><b>Nama </b></td>
                                                                    <td>:</td>
                                                                    <td>{{$jn->nama}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Alamat </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $jn->alamat }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Telepon </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $jn->telepon }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Email </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $jn->email }}</td>
                                                                </tr>
                                                            </table>
                                                        </div><!-- box-body-->
                                                    </div><!-- modal-body-->
                                                </div><!-- box-warning-->
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</button>
                                            </div><!-- md-footer -->
                                        </div><!--md-header-->
                                    </div><!--md-content-->
                                </div><!--md-dialog-->
                            </div><!--mydetailmodal-->
                            <!-- Ini akhiran modal detail -->

                            <!-- Ini awalan modal Edit -->
                            <div  id="myEditModal{{$jn->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Edit Supplier <strong>{{$jn->nama}}</strong><span style="margin: 19px;"></h3>
                                            <div class="box box-warning">
                                                <div class="modal-body">
                                                <!-- Start Form -->
                                                <form method="POST" action="{{ route('supplier.update', $jn->id) }}" accept-charset="UTF-8" role="form" class="form-loading-button" enctype="multipart/form-data"><input name="_method" type="hidden" value="PATCH">
                                                    {{method_field('patch')}}
                                                    {{csrf_field()}}
                                                    <div class="box-body">
                                                        <div class="form-group col-md-6 required ">
                                                            <label for="name" class="control-label">Nama Supplier</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="nama" type="text" value="{{$jn->nama}}" id="nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 required ">
                                                            <label for="name" class="control-label">Alamat Supplier</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="alamat" type="text" value="{{$jn->alamat}}" id="alamat">
                                                            </div>
                                                        </div>
                                                        <br><div class="form-group col-md-6 required ">
                                                            <label for="name" class="control-label">Telepon Supplier</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="telepon" type="text" value="{{$jn->telepon}}" id="telepon">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 required ">
                                                            <label for="name" class="control-label">Email Supplier</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="email" type="email" value="{{$jn->email}}" id="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- radio -->
                                                    <div class="form-group">
                                                        <div class="radio">
                                                        <label>
                                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="active" checked>
                                                            Active
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="inactive">
                                                            Inactive
                                                        </label>
                                                        </div>
                                                    </div>
                                                        <!-- /.box-body -->
                                                        <div class="box-footer">
                                                            <div class="col-md-12">
                                                                <div class="form-group no-margin">
                                                                <button type="submit" class="btn btn-success  button-submit" data-loading-text="Sedang memuat..."><span class="fa fa-save"></span>Simpan</button>
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-footer -->
                                                    </div>
                                                </form>
                                                <!-- End Form -->
                                                </div>
                                            </div>
                                        </div><!--md-header-->
                                    </div><!--md-content-->
                                </div><!--md-dialog-->
                            </div><!--mydetailmodal-->
                            <!-- Ini akhiran modal Edit -->

                            <!-- Large modal  Hapus-->
                            <div  id="myHapusModal{{$jn->id}}" class="modal modal-danger fade" role="document">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data </h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="text-center">
                                                    <h3>Yakin Mau Menghapus<strong> {{$jn->nama}} </strong>?</h3>
                                                </div>
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div><br />
                                                @endif
                                            <form method="post" action="{{ route('supplier.destroy',$jn->id) }}" style="margin: 19px;">
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                            <div class="modal-footer">
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
                                                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span> Ya, Hapus</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal Hapus -->
                     </td>
                        </tr>
                        @endforeach
                        @endif
                </tbody>
        </table>
        </div>
    </div>
@endsection
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script> --}}
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
    url: "{{ route('supplier.multiple-delete') }}",
    type: 'POST',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    data: 'ids='+strIds,
    success: function (data) {
        window.location.href = "supplier";
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
