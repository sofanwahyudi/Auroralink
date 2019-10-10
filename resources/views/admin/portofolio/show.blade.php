<div class="body-box">
    <table class="table table-bordered">
    <tr>
        <td>ID </td>
        <td>Title</td>
        <td>Deskripsi</td>
        <td> Youtube ID </td>
        <td>Gambar</td>
    </tr>
    <tr>
        <td>{{$model->id}}</td>
        <td>{{$model->title}}</td>
        <td>{{ $model->deskripsi }}</td>
        <td>{{ $model->url }}</td>
        <td>
        <img src="{{$model->getGambar()}}" class="img-fluid">
        </td>
        <td><span class="badge bg-red"></span></td>
    </table>
</div>
