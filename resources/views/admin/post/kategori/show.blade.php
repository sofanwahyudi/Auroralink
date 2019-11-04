<div class="body-box">
    <table class="table table-bordered">
        <tr>
            <td>ID </td>
            <td>Nama Kategori</td>
            <td>Judul Post</td>
        </tr>
        <tr>
            <td>{{$model->id}}</td>
            <td><span class="badge bg-green">{{$model->category}}</span></td>
            <td>
            @foreach ($model->post as $rl)
            <span class="badge bg-red">{{$rl->title}}
            </span>
            @endforeach</td>
    </table>
    </div>
