 @foreach ($portofolio as $data)

   <div>
        <div class="js-modal-btn" data-video-id="{{ $data->url }}">
            <img src="{{$data->getGambar()}}" class="img-responsive" alt="img">
            <span>{{ $data->title }}</span>
            <p>{{ $data->deskripsi }}</p>
        </div>
    </div>

 @endforeach
