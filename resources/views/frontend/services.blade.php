@foreach ($services as $data)
        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="{{$data->getGambar()}}" alt="img" class="img-fluid">
            <h4>{{ $data->nama }}</h4>
            <p>{{ $data->deskripsi }}</p>
          </div>
        </div>
@endforeach
