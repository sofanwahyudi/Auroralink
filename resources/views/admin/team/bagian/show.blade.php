<div class="body-box">
    <table class="table table-bordered">
    <tr>
        <td>ID </td>
        <td>Nama</td>
        <td>Devisi</td>
    </tr>
    <tr>
        <td>{{$model->id}}</td>
        <td>{{$model->nama}}</td>
        <td><span class="badge bg-red">{{$model->devisi->name}}</span></td>
    </table>
</div>
