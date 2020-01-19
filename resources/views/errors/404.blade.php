@extends('frontend.base.layout')

@section('title')
Oops! Page not found.
@stop
@section('404')
<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>
        <div class="error-content">
    <div class="zoomIn wow animated animated" >
        <img src="{{url('/image/Auroralink_page_not_found.jpg')}}" alt="About" class="img-thumbnail">
      </div>
        </div>
  <!-- /.error-content -->
</div>
<!-- /.error-page -->
</section>
@stop

