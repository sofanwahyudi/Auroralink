@foreach ($team as $data)
   <div class="top_left_cont zoomIn wow animated animated">
            <img src="http://bit.ly/2B0Uxlj" class="rounded-circle" alt="img">
            <span>{{ $data->bagian['nama'] }}</span>
            <p>{{ $data->nama }}</p>
        </div>
@endforeach

{{--  <div tabindex="-1" style="width: 100%; display: inline-block;">
<div class="d-flex flex-column">
<img src="http://bit.ly/2B0Uxlj" alt="">
<div class="mt-3 Name">Andree Wijaya</div>
<div class="Posisi">CEO/CTO</div></div></div>  --}}
