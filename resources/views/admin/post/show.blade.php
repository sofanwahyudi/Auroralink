<div class="body-box">
 <center><img src="{{$model->image}}" class="img-fluid"></center>
    <table class="table table-bordered">
        <tr>
            <td>Title </td>
            <td>Content </td>
            <td>Slug </td>
            <td>Tags </td>
            <td>Kategori </td>
        </tr>
        <tr>
            <td>{{$model->title}}</td>
             <td>{!! $model->content !!}</td>
            <td><span class="badge bg-green">{{$model->slug}}</span></td>
            <td><span class="badge bg-blue">
            @foreach ($model->tags as $item)
                #{{ $item->tags }}
            @endforeach
            </span></td>
            <td>
                <span class="badge bg-red">{{ $model->kategori['category'] }}</span>
            </td>
    </table>
    </div>
