<div class="body-box">
 <center><img src="{{$model->image}}" class="img-fluid"></center>
    <table class="table table-bordered">
        <tr>
            <td>No Tickets </td>
            <td>Subject </td>
            <td>Content </td>
            <td>Status </td>
            <td>Kategori </td>
            <td>Prioritas </td>
            <td>Team </td>
            <td>Pelanggan </td>
        </tr>
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->subject}}</td>
            <td>{{ $model->content }}</td>
            <td><span class="badge bg-{{$model->status['color']}}">{{$model->status['name']}}</span></td>
            <td><span class="badge bg-{{$model->category['color']}}">{{ $model->category['name'] }}</span></td>
            <td><span class="badge bg-{{$model->priority['color']}}">{{ $model->priority['name'] }}</span></td>
            <td>{{ $model->team['nama'] }}
            <td>{{ $model->users['name'] }}
    </table>
    </div>
