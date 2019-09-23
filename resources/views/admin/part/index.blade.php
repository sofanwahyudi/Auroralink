@extends('layouts.master')
@section('title')
    Part | Auroralink
@endsection
@section('content_header')
    <h1>
        <span class="fa fa-cubes"></span>Part
        <a href="#" data-toggle="modal" data-target="#myAddModal" class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
        <a href="#" data-url="" class="btn-sm btn-danger delete-all"><span class="fa fa-trash"></span> Hapus Data Terpilih</a>
    {{-- <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Delete All</button> --}}
    </h1>
    <ol class="breadcrumb">
    <li>
    <a href="{{route('export_part_xls')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file-excel-o" style="color:white"></span> Export Excel</a>
    <a href="{{route('export_part_csv')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file" style="color:white"></span> Export Csv</a>
    </li>
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Part</li>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Produk <span style="margin: 19px;"></h3>
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
                                        <form method="POST" action="{{ route('part.store') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                        <div class="box-body">
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                            <label for="name" class="control-label">Nama</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Nama Part" required="required" name="nama" type="text" id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="description" class="control-label">Deskripsi</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Deskripsi Part" required="required" name="deskripsi" type="text" id="deskripsi">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="description" class="control-label">Harga Jual</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Harga Jual" required="required" name="harga_jual" type="money" id="harga_jual">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="description" class="control-label">Harga beli</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Harga Beli" required="required" name="harga_beli" type="money" id="harga_beli">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="description" class="control-label">Berat</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                                                    <input class="form-control" placeholder="Masukkan Berat dalam gram" required="required" name="berat" type="number" id="berat">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Kategori Part</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                    <select id="kategori_id" class="form-control select2" name="kategori_id">
                                                        <option value="#">-- Pilih Kategori Produk --</option>
                                                        @foreach (\App\Model\Kategori::all() as $jp)
                                                        <option value="{{$jp->id}}">{{$jp->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 required ">
                                                <label for="name" class="control-label">Supplier</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                    <select id="supplier_id" class="form-control select2" name="supplier_id">
                                                        <option value="#">-- Pilih Satuan Produk --</option>
                                                        @foreach (\App\Supplier::all() as $jp)
                                                        <option value="{{$jp->id}}">{{$jp->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                <label for="name" class="control-label">Gambar <i> (ukuran gambar maksimal adalah 300 X 200)</i></label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                                        <input class="form-control" placeholder="Upload Gambar Produk"  name="gambar" type="file" id="gambar"  enctype="multipart/form-data">
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <!-- box-footer -->
                                        <div class="box-footer">
                                        <div class="col-md-12">
                                            <div class="form-group no-margin">
                                            <button type="submit" class="btn btn-success  button-submit" data-loading-text="Sedang memuat..."><span class="fa fa-save"></span> Simpan</button>
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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Gambar</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sku</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Barcode</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Jual</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">beli</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>
                        @if($data->count())
                        @foreach($data as $key => $object)
                        <tr>
                            <td><input type="checkbox" class="checkbox" data-id="{{$object->id}}"></td>
                            <td>{{$key+1}}</td>
                            <td><img src="{{$object->getGambar()}}" style="width:50px;height:50px;" class="img-thumbnail img-corner"></td>
                            <td>{{$object->sku}}</td>
                            <td><img src="data:image/png;base64,{{DNS1D::getBarcodePNG($object->sku, 'C39')}}" height="30" width="50"></td>
                            <td>{{$object->nama}}</td>
                            <td>Rp. {{ number_format($object->harga_jual) }}</td>
                            <td>Rp. {{ number_format($object->harga_beli) }}</td>
                            <td>
                            <a href="#" data-toggle="modal" data-target="#myDetailModal{{ $object->id }}" class="btn-sm btn-warning"><span class="fa fa-info-circle"></span></a>
                            <a href="#" data-toggle="modal" data-target="#myEditModal{{ $object->id }}" class="btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                            <a href="#" data-toggle="modal" data-target="#myHapusModal{{ $object->id }}" class="btn-sm btn-danger"><span class="fa fa-trash"></span></a>

                            <!-- Ini awalan modal detail -->
                            <div  id="myDetailModal{{$object->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel">Detail Kategori <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($object->sku, 'C39')}}" height="30" width="50"><span style="margin: 19px;"></h3>
                                                <div class="box box-warning">
                                                <div class="text-center">
                                                        <h3><strong>{{$object->nama}} ({{$object->sku}})</strong></h3>
                                                        <img src="{{$object->getGambar()}}" class="img-fluid"><br><br>
                                                </div><!--text-center -->
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                                <div class="col-md-6">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <td><b>Sku </b></td>
                                                                                <td>{{$object->sku}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Nama </b></td>
                                                                                <td>{{$object->nama}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Deskripsi </b></td>
                                                                                <td>{{ $object->deskripsi }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>berat </b></td>
                                                                                <td>{{ $object->berat }}</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <td><b>Harga Jual </b></td>
                                                                                <td>Rp. {{ number_format($object->harga_jual)}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Harga Beli </b></td>
                                                                                <td>Rp. {{ number_format($object->harga_beli) }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Supplier </b></td>
                                                                                <td>{{ $object->supplier['nama'] }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Kategori </b></td>
                                                                                <td>{{ $object->kategori['nama'] }}</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
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
                                        <h3 class="modal-title" id="myModalLabel">Edit Part <strong>{{$object->nama}}</strong><span style="margin: 19px;"></h3>
                                            <div class="box box-warning">
                                                <div class="modal-body">
                                                <!-- Start Form -->
                                                <form method="POST" action="{{ route('part.update', $object->id) }}" accept-charset="UTF-8" role="form" class="form-loading-button" enctype="multipart/form-data"><input name="_method" type="hidden" value="PATCH">
                                                    {{method_field('patch')}}
                                                    {{csrf_field()}}
                                                    <div class="box-body">
                                                        <div class="form-group col-md-6 ">
                                                            <label for="name" class="control-label">Sku Part</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-barcode"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="sku" type="text" value="{{$object->sku}}" id="part" disabled="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label">Nama Part</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="nama" type="text" value="{{$object->nama}}" id="nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label">Deskripsi Part</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="deskripsi" type="text" value="{{$object->deskripsi}}" id="deskripsi">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label">Harga Beli</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="harga_jual" type="money" value="{{$object->harga_jual}}" id="harga_jual">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label">Harga Jual</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="harga_beli" type="money" value="{{$object->harga_beli}}" id="harga_beli">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label">Berat Part</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                                                                    <input class="form-control" placeholder="Masukkan Nama" required="required" name="berat" type="text" value="{{$object->berat}}" id="berat">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label">Kategori Part</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <select id="kategori_id" class="form-control select2" name="kategori_id">
                                                                        <option value="#">-- Pilih Kategori Part --</option>
                                                                        @foreach (\App\Model\Kategori::all() as $jp)
                                                                        <option value="{{$jp->id}}" selected="selected">{{$jp->nama}} </option>
                                                                        @endforeach
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label">Supplier Part</label><br>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-filter"></i></div>
                                                                    <select id="supplier_id" class="form-control select2" name="supplier_id">
                                                                        <option value="#">-- Pilih Supplier Part --</option>
                                                                        @foreach (\App\Supplier::all() as $jp)
                                                                        <option value="{{$jp->id}}" selected="selected">{{$jp->nama}} </option>
                                                                        @endforeach
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label">Gambar Part<i></i></label>
                                                                <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                                                <input class="form-control" placeholder="Masukkan Nama" required="required" name="gambar" type="file" value="{{$object->gambar}}" id="gambar">
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
                                            <form method="post" action="{{ route('part.destroy',$object->id) }}" style="margin: 19px;">
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
    url: "{{ route('part.multiple-delete') }}",
    type: 'POST',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    data: 'ids='+strIds,
    success: function (data) {
        window.location.href = "part";
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
                    window.location.href = "part";
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
