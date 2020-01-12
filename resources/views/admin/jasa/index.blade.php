@extends('layouts.master')
@section('title')
    Jasa | Auroralink
@endsection
@section('content_header')
    <h1>
        <span class="fa fa-list"></span> Jasa
        <a href="{{route('jasa.create')}}" class="btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
        {{-- <a href="#" data-url="" class="btn-sm btn-danger delete-all"><span class="fa fa-trash"></span> Hapus Data Terpilih</a> --}}
    {{-- <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Delete All</button> --}}
    </h1>
    <ol class="breadcrumb">
    <li>
    {{-- <a href="{{route('export_part_xls')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file-excel-o" style="color:white"></span> Export Excel</a>
    <a href="{{route('export_part_csv')}}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file" style="color:white"></span> Export Csv</a> --}}
    </li>
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Jasa</li>
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

            <table id="datatable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    {{-- <th class="sorting_asc"> <input type="checkbox" id="check_all"></th> --}}
                    {{-- <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th>No</th> --}}
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Gambar</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Deskripsi</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Harga</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>
                </tbody>
        </table>
        </div>
    </div>
@endsection
<script type="text/javascript" src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/dist/js/sweetalert.js')}}"></script>

<script>
$(document).ready(function(){
    var table = $('#datatable').DataTable(
                {
                processing: true,
                serverSide: true,
                ajax: "{{route('jasa.json')}}",
                columns: [
                    { data: 'gambar', name: 'gambar', render: function( data, type, full, meta ) {
                        if (data == null) {
                            return "<img src=\"/image/dash.jpeg\" height=\"50\"/>";
                        } else {
                            return "<img src=\"/image/" + data + "\" height=\"50\"/>";
                        }
                                } },
                    { data: 'nama', name: 'nama' },
                    { data: 'deskripsi', name: 'deskripsi'},
                    { data: 'harga', name: 'harga', render: function ( data, type, row ) {
                            return commaSeparateNumber("Rp" + data);
                            }  },
                    { data: 'action', orderable:false, searchable:false },
                ],
                }
                );
});

function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
    }
    return val;
}

// function addForm(){
//     save_method = "add";
//     $('input[name =_method]').val('POST');
//     $('#modal-form').modal('show');
//     $('#modal-form form')[0].reset();
//     $('#modal-title').text('Tambah Data')
// }

// function editForm(id){
//     save_method = 'edit';
//     $('input[name =_method]').val('PATCH');
//     $('#modal-form form')[0].reset();

//     $.ajax({
//         url : "{{url('jasa')}}" + '/' + id + "/edit" ,
//         type : "GET",
//         dataType : "JSON",
//         success: function(data){
//             $('#modal-form').modal('show');
//             $('#modal-title').text('Edit Data');

//             $('#id').val(data.id);
//             $('nama').val(data.nama);
//             $('deskripsi').val(data.deskripsi);
//             $('harga').val(data.harga);
//             $('fitur').val(data.fitur);
//             $('benefit').val(data.benefit);
//             $('job_id').val(data.job_id);
//             $('jam_id').val(data.jam_id);
//         },
//         error : function(){
//             alert("Data Tidak ada")
//         }
//     })
// }

// function deleteData(id){
//     var popup = confirm("Apak Kamu Yakin ? ");
//     var csrf_token = $('meta[name="csrf-token"]').attr('content');
//     if(popup == true){
//         $.ajax({
//             url: "{{url('jasa')}}" + '/' + id,
//             type: "POST",
//             data: {'_method' : 'DELETE', '_token' : csrf_token},
//             success: function(data){
//                 table.ajax.reload();
//                 console.log(data);
//             },
//             error: function(){
//                 alert("ow ow ada yang salah")
//             }
//         })
//     }
// }

// $(function(){
//     $('#modal-form form').validator().on('submit', function(e){
//         if (!e.isDefaultPrevented()){
//             var id = $('#id').val();
//             if (save_method == 'add') url = "{{url('jasa')}}";
//             else url = "{{url('jasa') . '/'}}" + id;

//             $.ajax({
//                 url : url,
//                 type : "POST",
//                 data : $('modal-form form').serialize(),
//                 success : function(response){
//                     $('#modal-form').modal('hide');
//                     table.ajax.reload();

//                     swal({
//                     title: "Berhasil!",
//                     text: "Data berhasil di Update",
//                     icon: "success",
//                     button: "Tutup",
//                 });
//                 },
//                 error : function(){
//                     alert('Oooow! Ada Masalah! ');
//                 }
//             });
//             return false;
//         }
//     })
// });


</script>
