@extends('frontend.base.medium')

@section('article')
<div class="col-md-12 col-md-offset-2 col-xs-12">
    <div class="mainheading">
        <h1 class="posttitle text-center">{{$tickets->slug}}</h1>
    </div>
    <!-- Begin Post Content -->
    <div class="article-post">
            <p>{!! $tickets->content !!}</p>
    <!-- Begin Tags -->
    <div class="after-post-tags">
            <div class="tags">
                <div class="row">
                <div class="col-md-3">Status: <span class="w3-tag w3-blue">{{$tickets->status['name']}}</div>
                <div class="col-md-3">Category: <span class="w3-tag w3-blue">{{$tickets->category['name']}}</div>
                <div class="col-md-3">Priority: <span class="w3-tag w3-blue">{{$tickets->priority['name']}}</div>
                </div>
            </div>
    </div> <!-- End Tags -->
    </div>
        <!-- End Post Content -->
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
<div class="comment">
        <div class="author-info">
            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($tickets->users['email']))) . "?s=50&d=mm" }}" class="author-image">
                <div class="author-name">
                    <h4>{{ $tickets->users['name']}}</h4>
                    <p class="author-time">{{ $tickets->created_at->diffForHumans() }}</p>
                </div>
        </div>
    <div class="comment-content">
       Isi KOmentar
        <div class="author-button">
            {{--  @include('blog._formReply')  --}}
        </div>
    </div>
</div>


<div class="comment-reply">
    <div class="author-info">
            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($tickets->users['email']))) . "?s=50&d=mm" }}" class="author-image">
            <div class="author-name">
                    <h4> {{ $tickets->users['name']}}</h4>
                    <p class="author-time">{{ $tickets->created_at->diffForHumans() }}</p>
             </div>
    </div>
        <div class="comment-content">
            Isi KOmentar
        </div>
    <div class="author-button" style="margin-left:65px">
        {{--  @include('blog._ReplyToReply')  --}}
    </div>
</div>
<hr>
</div>

@endsection
