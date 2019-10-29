
<i class="fa fa-commenting bg-yellow"> Lets Comments Here</i>
<!-- /.box-header -->
<div class="box-body">
    {!! Form::open(['route' => ['comment.store', $blog->id], 'method'=> 'POST']) !!}
    <form role="form">
    <!-- text input -->
    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter Your Name...']) !!}
    </div>
    <div class="form-group">
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter Your Email...']) !!}
    </div>
    <!-- textarea -->
    <div class="form-group">
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Enter Your Comment Here....']) !!}
    </div>
    <div class="box-footer">
    <button type="submit" class="btn btn-primary">Send Comment</button>
    </div>
    {!! Form::close() !!}
</div>
{{--  @foreach($comments as $comment)
    <div class="display-comment" >
        <strong>users</strong>
        <p>Isi Komen</p>
        <a href="" id="reply"></a>
        <form method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="post_id" value="" />
                <input type="hidden" name="parent_id" value="" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('blog.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach  --}}
