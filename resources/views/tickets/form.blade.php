<div class="mainheading">
<i class="fa fa-commenting bg-yellow"> Lets Comments </i>
</div>
<hr>
@auth
    <div class="author-info">
    <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?s=50&d=mm" }}" class="author-image">
        <div class="author-name">
            <h4>{{ Auth::user()->name }}</h4>
        </div>
    </div>
    @else
    <p class="w3-tag w3-black">Noted:  Your must login for comment.
    <a href="{{ url('member/login') }}"><span class="fa fa-sign-in"></span> Login</a> OR
    @if (Route::has('register'))
    <a href="{{ url('member/register') }}"><span class="fa fa-user-plus"></span> Register</a>
    </p>
    @endif
@endauth


<!-- /.box-header -->
<div class="box-body">
    {!! Form::open(['route' => ['comment.ticket', $tickets->id], 'method'=> 'POST']) !!}
    <form role="form">
    <!-- textarea -->
    <div class="form-group required">
        {!! Form::textarea('body', null, ['class' => 'form-control editor', 'rows' => '5', 'placeholder' => 'Enter Your Comment Here....']) !!}
    </div>
    <div class="box-footer">
    <button type="submit" class="btn btn-primary">Send Comment</button>
    </div>
    {!! Form::close() !!}
</div>
