{!!Form::model($model, [
    'route' => $model->exists ? ['jasa.update', $model->id] :'jasa.store',
    'method' => $model->exists ? 'PUT':'POST',
    'files' => true,
])!!}
<div class="box-body">
    <div class="form-group">
        <label for="" class="control-label">Nama</label>
        <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Deskripsi</label>
        <div class="input-group">
            <textarea class="textarea form" id="deskripsi" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Harga</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::text('harga', null, ['class' => 'form-control', 'id' => 'harga', 'placeholder' => 'Masukan Harga']) !!}
        </div>
    </div>
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Jam Support</label>
        <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="jam_id" class="form-control select2" name="jam_id">
            <option value="#">-- Pilih Jam --</option>
            @foreach (\App\Model\Jam::all() as $jp)
            <option value="{{$jp->id}}" >{{$jp->nama}} - {{$jp->jam_start}} s/d {{$jp->jam_end}}</option>
            @endforeach
        </select>
        </div>
        </div>
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Kategori Jasa</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-filter"></i></div>
            <select id="job_id" class="form-control select2" name="job_id">
                <option value="#">-- Pilih Kategori Jasa--</option>
                @foreach (\App\Model\Job::all() as $jp)
                <option value="{{$jp->id}}" >{{$jp->nama}}</option>
                @endforeach
            </select>
            </div>
    </div>
    <div class="form-group col-md-6 required " enctype="multipart/form-data">
    <label for="name" class="control-label">Gambar <i> (ukuran gambar maksimal adalah 300 X 200)</i></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-image"></i></div>
            {{-- <input class="form-control" placeholder="Upload Gambar Part" required="required" name="gambar" type="file" id="gambar" enctype="multipart/form-data"> --}}
            {!! Form::file('gambar') !!}
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Fitur</label>
        <div class="input-group">
            <textarea class="textarea form" id="fitur" name="fitur" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label">Benefit</label>
        <div class="input-group">
            <textarea class="textarea form" id="benefit" name="benefit" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script>
$('.textarea').wysihtml5()
</script>

