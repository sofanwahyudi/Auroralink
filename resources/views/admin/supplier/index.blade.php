@extends('layouts.master')
@section('title')
    Supplier | Auroralink
@endsection
@section('content_header')
    <h1>
        <span class="fa fa-user"></span> Supplier
        <a href="{{route('supplier.create')}}" class="btn-sm btn-primary modal-show" title="Tambah Data"><span class="fa fa-plus"></span> Tambah Data</a>
        <a href="#" data-url="" class="btn-sm btn-danger delete-all"><span class="fa fa-trash"></span> Hapus Data Terpilih</a>
    {{-- <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Delete All</button> --}}
    </h1>
    <ol class="breadcrumb">
    <li>
            <a href="{{ route('exporte') }}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file-excel-o" style="color:white"></span> Export Excel</a>
            <a href="{{ route('exports') }}" class="btn-sm btn-success" style="color:white"><span class="fa fa-file" style="color:white"></span> Export Csv</a>
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
            <table id="datatable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    {{-- <th class="sorting_asc"> <input type="checkbox" id="check_all"></th> --}}
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Alamat</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Telepon</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Website</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                    <th width="150px">Aksi</th></tr>
                </thead>
                <tbody>
                </tbody>
        </table>
        </div>
    </div>
@endsection
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script> --}}
<script type="text/javascript" src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>


<script>
    //Jquery Datatable ServerSide
    $(document).ready(function(){
        $('#datatable').DataTable(
        {
        processing: true,
        responsive: true,
        serverSide: true,
        ajax: "{{route('supplier.json')}}",
        columns: [
            // { data: 'checkbox', orderable:false, searchable:false },
            { data: 'id', name: 'id' },
            { data: 'nama', name: 'nama' },
            { data: 'alamat', name: 'alamat' },
            { data: 'telepon', name: 'telepon' },
            { data: 'email', name: 'email' },
            { data: 'website', name: 'website' },
            { data: 'status', name: 'status' },
            { data: 'action', orderable:false, searchable:false },
        ]
        }
        );

    //Fungsi Delete
    $(document).on('click', '.hapus', function(){
        var id = $(this).attr('id');
        if (confirm("Apa Anda Yakin ???")) {
            $.ajax({
                url:"{{route('supplier.destroy')}}",
                method:"GET",
                data:{id:id},
                success:function(data){
                    alert('Data Berhasil Di Hapus...');
                    $('#datatable').DataTable().ajax.reload();
                }
            })
        } else {
            return false;
        }
    });

    //Jquery Multiple Delete
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
    //Ajax Multiple Delete
    $.ajax({
        url: "{{ route('supplier.multiple-delete') }}",
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: 'ids='+strIds,
        success: function (data) {
            $('#datatable').DataTable().ajax.reload();
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
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        $('#datatable').DataTable().ajax.reload();
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
