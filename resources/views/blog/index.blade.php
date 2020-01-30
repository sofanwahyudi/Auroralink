@extends('frontend.base.medium')

@section('title')
Auroralink | Blog
@stop
{{--  @section('nav')
<a class="nav-link" href="{{ url('/') }}" style="color:grey;">Home</a>
<a class="nav-link" href="{{ url('/blog') }}" style="color:grey;">Index Of Blog</a>


@foreach ($categories as $blog)
<a class="nav-link" href="{{url("/blog/categories/$blog->slug")}}" style="color:grey;">{{ $blog->category }}</a>
@endforeach
@endsection  --}}
@section('search')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div id="custom-search-input">
                <div class="input-group">
                    <input id="search" name="search" type="text" class="form-control" placeholder="Search" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('ads')
    <div class="text-center">
        <img src="{{ url('image/Auroralink.png') }}" class="img-fluid" alt="Responsive image" width='500'>

    </div>
@endsection

@section('content')
@foreach ($blogs as  $blog)
<!-- begin post -->
<div class="card">
        <div class="row">
            <div class="col-md-5 wrapthumbnail">
                <a href='#'>
                        <img class="img-fluid" src="{{ url('image/upload/'. $blog->image) }}" alt="">
                </a>
            </div>
            <div class="col-md-7">
                <div class="card-block">
                    <h2 class="card-title"><a href='{{url("/blog/read/post/$blog->slug")}}'>{{$blog->title}}</a></h2>
                    <h4 class="card-text">{{str_limit(strip_tags($blog->content),100)}}</h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
                            @foreach ($blog->tags as $item)
                            <span class="badge badge-info"> #{{ $item->tags }} </span>
                            @endforeach
                            <br>
                            {{--  <span class="author-meta"> Author : {{$blog->users['name']}}</span><br>  --}}
                            <span class="post-date fa fa-commenting-o"> Comments : {{$blog->comments->count()}}</span><br/>
                            <span class="post-date">Post at : {{ $blog->created_at->diffForHumans()}}</span>
                            <span class="post-read-more"><a href='{{url("/blog/read/post/$blog->slug")}}' title="Selengkapnya">Read More &raquo;</a></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach
   <!-- end post -->
@stop

{{-- @section('judul_recent')
Recent Post
@endsection --}}
{{-- @section('content_recent')
@endsection --}}
@section('js')
$( "#search" ).autocomplete({

        source: function(request, response) {
            $.ajax({
            url: "{{ route('search.post')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    //console.log(obj.city_name);
                    return obj.title;
               });

               response(resp);
            }
        });
    },
    minLength: 1
 });
@endsection
