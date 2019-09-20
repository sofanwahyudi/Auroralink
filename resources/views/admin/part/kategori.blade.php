@extends('layouts.master')
@section('title')
Kategori Part | Auroralink
@stop
@section('content_header')
    <h1>
        <span class="fa fa-filter"></span> Kategori Part
        <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
        <a href="#" data-url="" class="btn-sm btn-danger delete-all"><span class="fa fa-trash"></span> Hapus Data Terpilih</a>
    {{-- <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Delete All</button> --}}
    </h1>
    <ol class="breadcrumb">
    <li>
    <a href="{{route('export_kategori_xls')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file-excel-o" style="color:white"></span> Export Excel</a>
    <a href="{{route('export_kategori_csv')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file" style="color:white"></span> Export Csv</a>
    </li>
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Part</li>
      <li class="active">Kategori</li>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Kategori <span style="margin: 19px;"></h3>
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
                                         <form method="POST" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group col-md-6 ">
                                        <label for="name" class="control-label">Nama</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                                <input class="form-control" placeholder="Masukkan Nama Kategori" name="nama" type="text" id="nama">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 required ">
                                        <label for="name" class="control-label">Deskripsi</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                <input class="form-control" placeholder="Masukkan Deskripsi" name="deskripsi" type="text" id="deskripsi">
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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Deskripsi</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>
                        @if($data->count())
                        @foreach($data as $key => $object)
                        <tr>
                            <td><input type="checkbox" class="checkbox" data-id="{{$object->id}}"></td>
                            <td>{{$key+1}}</td>
                            <td>{{$object->nama}}</td>
                            <td>{{$object->deskripsi}}</td>
                            <td>
                                    <a href="#" data-toggle="modal" data-target="#myDetailModal{{ $object->id }}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myEditModal{{ $object->id }}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#myHapusModal{{ $object->id }}" class="btn-sm btn-danger"><span class="fa fa-trash"></span></a>

                            <!-- Ini awalan modal detail -->
                            <div  id="myDetailModal{{$object->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Detail Kategori <strong>{{$object->nama}}</strong> Kode : {{$object->kode_supplier}} <span style="margin: 19px;"></h3>
                                                <div class="box box-warning">
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td><b>Nama </b></td>
                                                                    <td>:</td>
                                                                    <td>{{$object->nama}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Deskripsi </b></td>
                                                                    <td>:</td>
                                                                    <td>{{ $object->deskripsi }}</td>
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
                            <div  id="myEditModal{{$object->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Edit Kategori <strong>{{$object->nama}}</strong><span style="margin: 19px;"></h3>
                                            <div class="box box-warning">
                                                <div class="modal-body">
                                                <!-- Start Form -->
                                                <form method="POST" action="{{ route('kategori.update', $object->id) }}" accept-charset="UTF-8" role="form" class="form-loading-button" enctype="multipart/form-data"><input name="_method" type="hidden" value="PATCH">
                                                    {{method_field('patch')}}
                                                    {{csrf_field()}}
                                                    <div class="box-body">
                                                        <div class="form-group col-md-6 ">
                                                            <label for="name" class="control-label">Nama Kategori</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="nama" type="text" value="{{$object->nama}}" id="nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label">Deskripsi Kategori</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="deskripsi" type="text" value="{{$object->deskripsi}}" id="deskripsi">
                                                            </div>
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
                            <div  id="myHapusModal{{$object->id}}" class="modal modal-danger fade" role="document">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data </h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="text-center">
                                                    <h3>Yakin Mau Menghapus<strong> {{$object->nama}} </strong>?</h3>
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
                                            <form method="post" action="{{ route('kategori.destroy',$object->id) }}" style="margin: 19px;">
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
    url: "{{ route('kategori.multiple-delete') }}",
    type: 'POST',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    data: 'ids='+strIds,
    success: function (data) {
        window.location.href = "kategori";
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
                    window.location.href = "kategori";
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
