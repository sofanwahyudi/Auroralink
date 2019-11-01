<div class="body-box">
    <table class="table table-bordered">
        <tr>
            <td>Nama</td>
            <td>Post</td>
            <td>Komentar</td>
        </tr>
        <tr>
            <td>{{$model->users->name}}</td>
            <td>{{ $model->commentable_type}}</td>
            <td>{{$model->body}}</td>
    </table>
    </div>
