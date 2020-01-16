@extends('frontend.base.layout')

@section('title')
  Auroralink | {{$service->nama}}
@stop
@section('about')
    <section id="about-us" class="about-us padd-section wow fadeInUp">
        <div class="container">
            <div class="justify-content-center">

                <div class="text-center top_left_cont zoomIn wow animated animated" >
                    <img src="{{$service->getGambar()}}">
                  </div>
                    <div class="about-content">
                      <h2><span></span>{{$service->nama}} </h2>
                      <hr>
                      {!! $service->deskripsi !!}
                      <p>
                        {!! $service->content !!}
                      </p>
                      <hr>
                      <div class="text-center">
                        <a class="btn btn-success" href="#"><span class="fa fa-whatsapp fa-lg"></span> Hubungi Kami Sekarang</a>
                      </div>
                      <hr>
                      <p>
                        {!! $service->fitur !!}
                      </p>
                      <hr>
                      <div class="text-center">
                        <a class="btn btn-success" href="#"><span class="fa fa-whatsapp fa-lg"></span> Hubungi Kami Sekarang</a>
                      </div>
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
