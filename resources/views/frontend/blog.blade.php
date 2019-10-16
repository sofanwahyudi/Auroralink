@foreach ($blog as $post)

<div class="col-md-6 col-lg-4 top_left_cont zoomIn wow animated animated">
    <div class="block-blog text-left">
        <a href="#"><img src="asset/img/blog/blog-image-1.jpg" alt="img"></a>
        <div class="content-blog">
        <h4>{{ $post->title }}</h4>
        <span>{{date('d M Y',strtotime($post->created_at))}}</span>
        <a class="pull-right btn btn-primary " href="#">read more</a>
        </div>
    </div>
</div>
@endforeach
