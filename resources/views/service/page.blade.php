@extends('frontend.base.layout')

@section('title')
  Reliable IT Support Partners
@stop
@section('about')
    <section id="about-us" class="about-us padd-section wow fadeInUp" style="background-image:url('image/background1.png');">
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
                      <section id="screenshots" class="padd-section text-center wow fadeInUp">
                        <div class="container-fluid container-full">
                            <div class="section-title text-center">
                                <h3>Desain Keren untuk Website Anda</h3>
                                <hr>
                                <p class="separator"> Pilih sesuai tema website yang akan dibuat. Tersedia puluhan desain
                                    yang siap membuat Anda menuai pujian pengunjung website. </p>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                    @foreach ($galeri as $data)
                                    <div class="col-md-6" style="margin-top:50px;">
                                        <div class="feature-block">
                                                <img src="{{$data->getGambar()}}">
                                         </div>
                                     </div>

                                  @endforeach
                                </div>
                        </div>
                  </section>

                  </div>
                <p class='wa-title'>Jika anda mempunyai pertanyaan silahkan kirim pesan anda melalui form Whatsapp dengan mengeklik icon whatsapp di bawah</p>

            </div>
    </div>
  </section>
@stop
