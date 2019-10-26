@extends('frontend.base.layout')


@section('title')
    Blog Auroralink
@stop
@section('blog')
        <section id="blog" class="padd-section wow fadeInUp">

        <div class="container">
        <div class="section-title text-center">

            <h2>Blog Auroralink</h2>
            <p class="separator">   .</p>

        </div>
        </div>

        <div class="container">
        <div class="row">
        @foreach ($blog as $post)

        <div class="col-md-6 col-lg-4 top_left_cont zoomIn wow animated animated">
            <div class="block-blog text-left">
                <a href="#"><img src="{{ url('image/upload/'. $post->image) }}" alt="img"></a>
                <div class="content-blog">
                @foreach ($post->tags as $item)
                <span class="badge badge-info"> #{{ $item->tags }} </span>
                @endforeach
                <br><h4>{{ $post->title }}</h4>
                <span class="badge badge-warning">{{date('d M Y',strtotime($post->created_at))}}</span>
                <a class="pull-right btn btn-primary " href="#">read more</a>

                </div>
            </div>
        </div>
        @endforeach
        </div>
        </div>
    </section>
@stop
