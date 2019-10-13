@foreach ($section as $item)
<div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="asset/img/svg/cloud.svg" alt="img" class="img-fluid">
            <h4>{{ $item->title }}</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            <a href="#">read more</a>

          </div>
        </div>

        {{--  <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="asset/img/svg/planet.svg" alt="img" class="img-fluid">
            <h4>user friendly interface</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            <a href="#">read more</a>

          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="asset/img/svg/asteroid.svg" alt="img" class="img-fluid">
            <h4>build the app everyone love</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            <a href="#">read more</a>




          </div>
        </div>  --}}
@endforeach
