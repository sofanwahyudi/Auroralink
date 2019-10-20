@foreach ($team as $data)
   <div class="top_left_cont zoomIn wow animated animated">
            <img src="{{$data->getGambar()}}" class="rounded-circle" alt="about" height="200" width="200">
            <div class="top-top">
            <span>{{ $data->nama }} </span><br>
            <span class="badge badge-primary">{{ $data->bagian['nama'] }} </span>
            </div>
        </div>
@endforeach

{{--  <div tabindex="-1" style="width: 100%; display: inline-block;">
<div class="d-flex flex-column">
<img src="http://bit.ly/2B0Uxlj" alt="">
<div class="mt-3 Name">Andree Wijaya</div>
<div class="Posisi">CEO/CTO</div></div></div>  --}}
