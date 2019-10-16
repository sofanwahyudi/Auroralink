
@foreach ($start as $data)
<div class="col-md-6 col-lg-4">
    <div class="feature-block">
            <img src="image/a.jpg" alt="About" class="img-start">
            <h4>{{ $data->title }}</h4>
            <p>{!! $data->content !!}</p>
    </div>
</div>
@endforeach


        {{--  <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="image/b.jpg" alt="About" class="img-start">
            <h4>user friendly interface</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>


          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="image/c.jpg" alt="About" class="img-start">
            <h4>build the app everyone love</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>





          </div>
        </div>  --}}

