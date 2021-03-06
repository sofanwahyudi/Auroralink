
@foreach ($blog as $post)

<div class="col-md-6 col-lg-4 top_left_cont zoomIn wow animated animated">
    <div class="block-blog text-left">
        <a href="{{url("/blog/read/post/$post->slug")}}"><img src="{{ url('image/upload/'. $post->image) }}" alt="img"></a>
        <div class="content-blog">
         {{-- @foreach ($post->tags as $item)
        <span class="badge badge-info"> #{{ $item->tags }} </span>
        @endforeach --}}
        <br><h4>{{ $post->title }}</h4>
        <span class="badge badge-warning">{{date('d M Y',strtotime($post->created_at))}}</span>
        <a class="pull-right btn btn-primary " href="{{url("/blog/read/post/$post->slug")}}">read more</a>

        </div>
    </div>
</div>
@endforeach

