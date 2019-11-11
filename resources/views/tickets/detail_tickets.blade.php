@extends('frontend.base.medium')

@section('article')
<div class="col-md-12 col-md-offset-2 col-xs-12">
    <div class="mainheading">
        <div class="panel-body">
            <div class="content">
                <h2 class="header">
                    #{{$tickets->no_ticket}}
                    <span class="pull-right">
                    <a href="http://ticketit.kordy.info/tickets/74/reopen" class="btn btn-success">Reopen Ticket</a>
                    </span>
                </h2>
                <div class="panel well well-sm">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                <strong>Status</strong>:
                                <span style="color: #15a000">{{ $tickets->status['name']}}</span>
                                </p>
                                <p>
                                <strong>Priority</strong>:
                                <span style="color: #069900">{{ $tickets->priority['name']}}</span>
                                </p>
                                <p>
                                <strong>Category</strong>:
                                <span style="color: #7e0099">{{ $tickets->category['name']}}</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p> <strong>Team</strong>: {{ $tickets->team['nama']}}</p>
                                <p> <strong>Created</strong>: {{ $tickets->created_at->diffForHumans() }}</p>
                                <p> <strong>Last Update</strong>: {{ $tickets->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="article-post">
                        <p>{!! $tickets->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@forelse ($tickets->comments as $item)
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
            @include('tickets._formReply')
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
        @include('tickets._ReplyToReply')
    </div>
</div>
@endforeach

@empty
<p><span class="w3-tag w3-green"> No Comment</span></p>
@endforelse
<hr>
<hr>
@include('tickets.form')
<hr>
</div>

@endsection
