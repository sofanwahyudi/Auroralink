<div class="body-box">
    <table class="table table-bordered">
        <tr>
            <td>Title </td>
            <td>Content </td>
            <td>Slug </td>
        </tr>
        <tr>
            <td>{{$model->title}}</td>
             <td>{{$model->content}}</td>
             <td>{{$model->categories->category}}</td>
            <td><span class="badge bg-green">{{$model->slug}}</span></td>
    </table>
    </div>
