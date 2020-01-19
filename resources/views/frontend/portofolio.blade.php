 @foreach ($portofolio as $data)

   <div class="top_left_cont zoomIn wow animated animated">
        <div class="js-modal-btn" data-video-id="{{ $data->url }}">
            <img src="{{$data->getGambar()}}" class="img-responsive" alt="img">
            <span>{{ $data->title }}</span>
            <p>{!! $data->deskripsi !!}</p>
        </div>
    </div>

 @endforeach
