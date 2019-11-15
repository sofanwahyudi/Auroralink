<div class="body-box">
    <table class="table table-bordered">
        <tr>
            <td>ID </td>
            <td>Merk</td>
            <td>Model</td>
        </tr>
        <tr>
            <td>{{$model->id}}</td>
            <td>
            <span class="badge bg-green">{{ $model->merk['name'] }}</span>
            </td>
            <td>{{ $model->name }}</td>
    </table>
    </div>
