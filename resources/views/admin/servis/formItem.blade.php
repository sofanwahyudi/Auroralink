<div class="form-body">
    <div class="form-group">
        <label class="control-label col-md-3">No</label>

        <div class="col-md-9">
            <input name="no" id="no" class="form-control" type="number" required="" readonly>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Serial Number</label>
        <div class="col-md-9">
            <input name="sn" id="sn" placeholder="Serial Number" class="form-control" type="text" required="">
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Warna</label>
        <div class="col-md-9">
            <input name="warna" id="warna" placeholder="Warna" class="form-control" type="Warna" required="">
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Merk</label>
        <div class="col-md-9">
            <select id="merk" class="form-control select2" name="merk">
                    <option value="#">-- Pilih Merk --</option>
                    @foreach (\App\Model\Merk::all() as $jp)
                    <option value="{{$jp->id}}">{{$jp->name}}</option>
                    @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Garansi</label>
        <div class="col-md-9">
            <select name="garansi" id="garansi" class="form-control select2" name="garansi_id">
                        <option value="#">-- Pilih Status Garansi--</option>
                        @foreach (\App\Model\Garansi::all() as $jp)
                        <option value="{{$jp->id}}">{{$jp->nama}}</option>
                        @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Kelengkapan</label>
        <div class="col-md-9">
            <select name="kelengkapan" id="kelengkapan[]" class="form-control select2" multiple="multiple" name="kelengkapan[]">
                @foreach (\App\Model\Kelengkapan::all() as $jp)
                <option value="{{$jp->id}}">{{$jp->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
<script type="text/javascript" src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){
    var set_number = function(){
    var l = $('tr').length;
        for (i = 0; i < l; i++) {
        $('#no').val(i);
        }

    }
    set_number();


    var clear = function()
    {
        $('input[name=no]').val('');
        $('input[name=sn]').val('');
        $('input[name=warna]').val('');
        $('select[name=merk]').val('');
        $('select[name=garansi]').val('');
        $('select[name=kelengkapan]').val('');
    }

    $("#btn-add").click(function(){
    var _id = $('input[name=no]').val();
    var _sn = $('input[name=sn]').val();
    if(!_sn){
        document.getElementById("sn").focus();
        return swal("Ups.. Kamu belum memasukan SN");
    }
    var _warna = $('input[name=warna]').val();
    if(!_warna){
        document.getElementById("warna").focus();
        return swal("Ups.. Kamu belum memasukan WARNA");
    }
    var _merk = $('select[name=merk]').val();
    if(!_merk){
        document.getElementById("merk").focus();
        return swal("Ups.. Kamu belum memilih MERK");
    }
    var _garansi = $('select[name=garansi]').val();
    if(!_garansi){
        document.getElementById("garansi").focus();
        return swal("Ups.. Kamu belum memilih GARANSI");
    }
    var _kelengkapan = $('select[name=kelengkapan]').val();
    if(!_kelengkapan){
        document.getElementById("kelengkapan").focus();
        return swal("Ups.. Kamu belum memilih KELENGKAPAN");
    }

    var _tr = '<tr> <td>'+_id+'</td> <td>'+_sn+'</td> <td>'+_warna+'</td> <td>'+_merk+'</td> <td>'+_garansi+'</td> <td>'+_kelengkapan+'</td> <td><a type="button" class="btn-sm btn-warning btn-edit"><span class="fa fa-edit" style="color:white"></span></a>  <a type="button" class="btn-sm btn-danger btn-hapus"><span class="fa fa-trash" style="color:white"></span></a></td> </tr>';

    //DATA APPEND TO TABLE LIST
    $('#data_table').append(_tr);


    // DATA CLEAR
    clear();
    set_number().length+1;

    }
    );


    $(document).on('click', '.btn-edit', function(){
    var _tr = $(this).closest('tr');
    var _id = $(_tr).find('td:eq(0)').text();
    var _sn= $(_tr).find('td:eq(1)').text();
    var _warna = $(_tr).find('td:eq(2)').text();
    var _merk = $(_tr).find('td:eq(3)').text();
    var _garansi = $(_tr).find('td:eq(4)').text();
    var _kelengkapan = $(_tr).find('td:eq(5)').text();
    // var trid = $(this).closest('tr').find('td:eq(0)').text();


    $('input[name=no]').val(_id);
    $('input[name=sn]').val(_sn);
    $('input[name=warna]').val(_warna);
    $('select[name=merk]').val(_merk);
    $('select[name=garansi]').val(_garansi);
    $('select[name=kelengkapan]').val(_kelengkapan);

    //    alert(_id);
    });

    $(document).on('click', '.btn-hapus', function(){
    $(this).closest("tr").remove();
    clear();
    set_number().length-1;
    });

});
</script>
<script>
$(document).ready(function(){
        $('.select2').select2()
})
</script>
