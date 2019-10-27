@extends('frontend.base.medium')
@section('title')
    Auroralink | {{$blog->title}}
@endsection
@section('nav')
{{-- @foreach ($categories as $cat)
<li class="nav-item">
<a class="nav-link" href='{{url("blog/kategori/$cat->id/".str_slug($cat->name))}}'>{{$cat->name}}</a>
</li>
@endforeach --}}
@endsection
@section('search')
                <form class="form-inline my-2 my-lg-0" method="get" action="{{url('blog/search')}}">
                <input class="form-control mr-sm-2" type="text" name="s" placeholder="Cari disini...">
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
        <h1 class="posttitle">{{$blog->title}}</h1>
    </div>

        <!-- Begin Featured Image -->
        <img class="featured-image img-fluid" src="{{ url('image/upload/'. $blog->image) }}" alt="">
        <!-- End Featured Image -->

        <!-- Begin Post Content -->
    <div class="article-post">
            <p>{{str_limit(strip_tags($blog->content),10000)}}</p>
    </div>
        <!-- End Post Content -->
        <!-- Begin Tags -->
    <div class="after-post-tags">
            <ul class="tags">
            @foreach ($blog as $item)
                {{--  <li><a href="#">{{$item}}</a></li>  --}}
                {{ dd($item) }}
            @endforeach
            </ul>
    </div> <!-- End Tags -->
</div>
<hr>
{{--  <div class="container">
<div class="col-md-6 col-md-offset-2 col-xs-12">
    <div class="mainheading">
        <h1 class="posttitle">{{$blog->title}}</h1>
    </div>

        <!-- Begin Featured Image -->
        <img class="featured-image img-fluid" src="{{asset('/' .$blog->image)}}" alt="">
        <!-- End Featured Image -->

        <!-- Begin Post Content -->
    <div class="article-post">
            <p>{{str_limit(strip_tags($blog->content),200)}}</p>
    </div>
        <!-- End Post Content -->

        <!-- Begin Tags -->
    <div class="after-post-tags">
            <ul class="tags">
                <li><a href="#">{{$blog->tags}}</a></li>
            </ul>
    </div> <!-- End Tags -->
</div>
</div>  --}}
@endsection
