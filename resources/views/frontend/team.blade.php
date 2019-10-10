@foreach ($team as $data)
        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="{{$data->getGambar()}}" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <span>{{ $data->bagian['nama'] }}</span>
              <h4>{{ $data->nama }}</h4>
            </div>
          </div>
        </div>
@endforeach
