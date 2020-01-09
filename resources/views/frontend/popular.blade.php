      <ul class="list-group list-group-flush">
        @foreach($popularPosts as $popularPost)
        <li class="list-group-item">
            <div class="block-blog text-left">
            <img src="{{ url('image/upload/'. $popularPost->image) }}" alt="img">
            <div class="content-blog">
                <a href="{{url("/blog/read/post/$popularPost->slug")}}">
                &nbsp;{{ substr($popularPost->title, 0, 20) }} ...
                <span class="badge badge-warning">
                    {{ $popularPost->view_count }} {{ str_plural('view', $popularPost->view_count)}}
                </span>
                </a>
                </div>
            </div>
            </li>
        @endforeach
      </ul>
