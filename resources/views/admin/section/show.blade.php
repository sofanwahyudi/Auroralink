<div class="body-box">
    <table class="table table-bordered">
    <tr>
        <td>ID </td>
        <td>Title</td>
        <td>Content</td>
    </tr>
    <tr>
        <td>{{$model->id}}</td>
        <td>{{$model->title}}</td>
        <td>{!! $model->content !!}</td>
        <td><span class="badge bg-red"></span></td>
    </table>
</div>
