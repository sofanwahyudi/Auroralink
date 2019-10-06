<div class="body-box">
    <table class="table table-bordered">
    <tr>
        <td>ID </td>
        <td>Nama</td>
        <td>Keterangan</td>
        <td>Jumlah Bagian</td>
    </tr>
    <tr>
        <td>{{$model->id}}</td>
        <td>{{$model->name}}</td>
        <td>{{$model->keterangan}}</td>
        {{--  <td>{{$model->bagian}}</td>  --}}
        <td><span class="badge bg-red">
        @foreach ($model->bagian as $rl)
        {{$rl->nama}},
        @endforeach
        </span></td>
    </table>
</div>
