@extends('frontend.base.medium')
@section('title')
    Auroralink | {{ htmlspecialchars($blog->title) }}
@endsection
{{--  @section('nav')
<a class="nav-link" href="{{ url('/') }}" style="color:grey;">Home</a>
<a class="nav-link" href="{{ url('/blog') }}" style="color:grey;">Index Of Blog</a>

@foreach ($cats as $ca)
<a class="nav-link" href="{{url("/blog/categories/$ca->slug")}}" style="color:grey;">{{ $ca->category }}</a>
@endforeach
@endsection  --}}
@section('ads')
    <div class="text-center">
        <img src="{{ url('image/Auroralink.png') }}" class="img-fluid" alt="Responsive image" width='500'>

    </div>
@endsection
@section('article')
@section('og')
<meta property="og:title" content="{{$blog->title}}" />
<meta property="og:image" content="{{ url('storage/upload/'. $blog->image) }}" />
<meta property="og:type" content="website" />
@endsection
<div class="col-md-12 col-md-offset-2 col-xs-12">
    <div class="mainheading">
        <h1 class="posttitle text-center">{{$blog->title}}</h1>
    </div>

        <!-- Begin Featured Image -->
        <img class="featured-image img-fluid" src="{{ url('storage/upload/'. $blog->image) }}" alt="">
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
<div class='container'>
    <div class='text-center'>
        @if ($message = Session::get('danger'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
        @if(Session::has('success'))
        <div class="alert alert-success">
        <strong>Success: </strong>{{ Session::get('success') }}
        </div>
        @endif
    </div>
</div>
<hr>
@include('blog.share',['url' => '{{url("/blog/post/$blog->slug")}}'])
<hr>
<h2 class='comment-title'><span class="fa fa-commenting-o"> {{ $blog->comments()->count() }} Comments</h2>
@forelse ($blog->comments as $item)

<div class="comment">
        <div class="author-info">
            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($item->email))) . "?s=50&d=mm" }}" class="author-image">
                <div class="author-name">
                    <h4>{{ $item->users->name }}</h4>
                    <p class="author-time">{{ $item->created_at->diffForHumans() }}</p>
                </div>
        </div>
    <div class="comment-content">
        {{ $item->body }}
        <div class="author-button">
            @include('blog._formReply')
        </div>
    </div>
</div>

@foreach ($item->comments as $reply)
<div class="comment-reply">
    <div class="author-info">
            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($reply->email))) . "?s=50&d=mm" }}" class="author-image">
            <div class="author-name">
                    <h4> {{ $reply->users->name }}</h4>
                    <p class="author-time">{{ $reply->created_at->diffForHumans() }}</p>
             </div>
    </div>
        <div class="comment-content">
            {{ $reply->body }}
        </div>
    <div class="author-button" style="margin-left:65px">
        @include('blog._ReplyToReply')
    </div>
</div>
@endforeach

@empty
<p><span class="w3-tag w3-green"> No Comment</span></p>
@endforelse

<hr>
@include('blog.form')
<hr>

@endsection

