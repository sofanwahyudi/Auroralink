@extends('frontend.base.layout')

@section('title')
  Reliable IT Support Partners
@stop
@section('about')
    <section id="about-us" class="about-us padd-section wow fadeInUp" style="background-image:url('image/background1.png');">
        <div class="container">
            <div class="justify-content-center">

                <div class="text-center top_left_cont zoomIn wow animated animated" >
                    <img src="{{$service->getGambar()}}" alt="About" class="img-about">
                  </div>
                    <div class="about-content">
                      <h2><span></span>{{$service->nama}} </h2>
                      <hr>
                      {!! $service->deskripsi !!}
                      <p>
                        {!! $service->content !!}
                      </p>
                      <hr>
                      #FITUR
                      <hr>
                      <p>
                        {!! $service->fitur !!}
                      </p>
                      <hr>
                      #BENEFIT
                      <hr>
                      <p>
                        {!! $service->benefit !!}
                      </p>

                  </div>
                <p class='wa-title'>Jika anda mempunyai pertanyaan silahkan kirim pesan anda melalui form Whatsapp dengan mengeklik icon whatsapp di bawah</p>

            </div>
    </div>
  </section>
@stop
