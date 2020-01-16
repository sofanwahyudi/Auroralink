@extends('frontend.base.layout')

@section('title')
  Jasa Pembuatan Website | Tema
@stop
@section('about')
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
                         <a href="{{$data->url}}"><img  src="{{$data->getGambar()}}"></a>
                         <a class="btn btn-success" target="_blank" href="{{$data->url}}"><span class="fa fa-send"></span> Demo</a>
                         <a class='btn btn-success' href='javascript:void(0);' onclick='openModal()'><span class="fa fa-whatsapp"></span> Chat Team</a>
                     </div>
                 </div>
              @endforeach
            </div>
    </div>
</section>
@stop
