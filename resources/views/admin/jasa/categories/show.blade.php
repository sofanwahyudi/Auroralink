<div class="body-box">
    <table class="table table-bordered">
    <tr>
        <td>ID </td>
        <td>Nama</td>
        <td>Keterangan</td>
    </tr>
    <tr>
        <td>{{$model->id}}</td>
        <td>{{$model->nama}}</td>
        <td>{{$model->keterangan}}</td>
        <td>Rp. {{$model->biaya}}</td>
        <td><span class="badge bg-red">test</span></td>
    </table>
</div>
