
<a data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2" style="margin-left:10px;"><span class="fa fa-thumbs-o-up"></span>  Like</a>
<a data-toggle="collapse" href="#multiCollapseExample1{{ $item->id }}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="margin-left:10px;"><span class="fa fa-reply"></span>  Reply</a>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1{{ $item->id }}">
      <div class="author-info">
            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()['email']))) . "?s=50&d=mm" }}" class="author-image">
            <div class="author-name">
                <h4>{{ Auth::user()['name']}}</h4>
                <p class="author-time"></p>
            </div>
        </div>
        {!! Form::open(['route' => ['comment.reply', $item->id], 'method'=> 'POST']) !!}
        {!! Form::text('body', null, ['class' => 'form-control','placeholder' => 'Enter Your Comment Here....']) !!}
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" style="margin-top:10px;">Send</button>
        </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
<hr>
<script>
$('.collapse').on('show.bs.collapse', function (e) {
    // Get clicked element that initiated the collapse...
    clicked = $(document).find("[href='#" + $(e.target).attr('id') + "']")
});
</script>
