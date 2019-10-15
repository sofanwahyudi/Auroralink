@foreach ($services as $data)
        <div class="col-md-6 col-lg-3 top_left_cont zoomIn wow animated animated">
          <div class="feature-block">
            <img src="image/c.jpg" alt="About" class="img-fluid">
            <h4>{{ $data->nama }}</h4>
            <p>{{ $data->deskripsi }}</p>
            <a class="btn btn-primary " href="#">read more</a>
          </div>

        </div>
@endforeach
