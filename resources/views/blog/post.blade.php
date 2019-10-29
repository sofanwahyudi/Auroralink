@extends('frontend.base.medium')
@section('title')
    Auroralink | {{ htmlspecialchars($blog->title) }}
@endsection

@section('search')
                <form class="form-inline my-2 my-lg-0" method="get" action="{{url('blog/search')}}">
                <input class="form-control mr-sm-2" type="text" name="s" placeholder="Search Here...">
                <span class="input-group-button">
                    <button class="btn btn-default" type="submit">
                        <span>
                            <span class="fa fa-search"></span>
                        </span>
                    </button>
                </span>
            </form>
@endsection
@section('categories')
{{--  {{$blog->name_categories}}  --}}
@endsection
@section('article')
<div class="col-md-12 col-md-offset-2 col-xs-12">
    <div class="mainheading">
        <h1 class="posttitle text-center">{{$blog->title}}</h1>
    </div>

        <!-- Begin Featured Image -->
        <img class="featured-image img-fluid" src="{{ url('image/upload/'. $blog->image) }}" alt="">
        <!-- End Featured Image -->

        <!-- Begin Post Content -->
    <div class="article-post">
            <p>{!! $blog->content !!}</p>
    </div>
        <!-- End Post Content -->
        <!-- Begin Tags -->
    <div class="after-post-tags">
            <ul class="tags">
            <p> Tags: </p>
            @foreach ($blog->tags as $item)
            <span class="w3-tag w3-blue">
            #{{ $item->tags }}
            </span>
            @endforeach
            </ul>
    </div> <!-- End Tags -->
</div>
<hr>
@include('blog.share',['url' => '{{url("/blog/post/$blog->slug")}}'])
<hr>
<h2 class='comment-title'><span class="fa fa-commenting-o"> {{ $blog->comments()->count() }} Comments</h2>
@foreach ($blog->comments as $item)
<div class="comment" @if($item->parent_id != null) style="margin-left:40px;" @endif>
    <div class="author-info">
        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($item->email))) . "?s=50&d=mm" }}" class="author-image">
        <div class="author-name">
        <h4>{{ $item->name }}</h4>
        <p class="author-time">{{date('F, nS, Y - g:iA' ,strtotime($item->created_at))}}</p>
        </div>
    </div>
    <div class="comment-content">
    {{ $item->body }}
    </div>
    <div class="author-button">
        <div class="comment-content">
            <a href="#"><span class="fa fa-thumbs-o-up"></span> Like</a>
            <a href="#"><span class="fa fa-reply" style="margin-left:25px;"></span> Reply</a>
        </div>
    </div>

</div>
@endforeach
<hr>
@include('blog.form')
<hr>
@endsection

