@foreach ($services as $data)
<div class="col-md-6 col-lg-3 top_left_cont zoomIn wow animated animated">
    <div class="feature-block">
    <img src="{{$data->getGambar()}}" alt="About" class="img-fluid">
    <h4>{{ $data->nama }}</h4>
    <p>{!! $data->deskripsi !!}</p>
    <a class="btn btn-primary " href="{{url("/layanan/$data->slug")}}">Selengkapnya</a>
    </div>
</div>
@endforeach
