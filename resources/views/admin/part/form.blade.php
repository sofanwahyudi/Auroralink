{!!Form::model($model, [
    'route' => $model->exists ? ['part.update', $model->id] :'part.store',
    'method' => $model->exists ? 'PUT':'POST',
])!!}
<div class="box-body">
    <div class="form-group col-md-6">
        <label for="" class="control-label">Nama</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Deskripsi</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::text('deskripsi', null, ['class' => 'form-control', 'id' => 'deskripsi', 'placeholder' => 'Masukan Deskripsi']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Harga Jual</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-money"></i></div>
            {!! Form::text('harga_jual', null, ['class' => 'form-control', 'id' => 'harga_jual', 'placeholder' => 'Masukan Harga Jual']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Harga Beli</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-money"></i></div>
            {!! Form::text('harga_beli', null, ['class' => 'form-control', 'id' => 'harga_beli', 'placeholder' => 'Masukan Harga Beli']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Berat</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-superscript"></i></div>
            {!! Form::text('berat', null, ['class' => 'form-control', 'id' => 'berat', 'placeholder' => 'Masukan Berat dalam satuan gram']) !!}
        </div>
    </div>
    <div class="form-group col-md-6 ">
    <label for="name" class="control-label">Gambar <i> (ukuran gambar maksimal adalah 300 X 200)</i></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-image"></i></div>
            <input class="form-control" placeholder="Upload Gambar Produk"  name="gambar" type="file" id="gambar"  enctype="multipart/form-data">
        </div>
    </div>
    <div class="form-group col-md-3 required ">
    <label for="name" class="control-label">Supplier</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="group_id" class="form-control select2" name="group_id">
            <option value="#">-- Pilih Supplier --</option>
            @foreach (\App\Supplier::all() as $jp)
            <option value="{{$jp->id}}">{{$jp->nama}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group col-md-3 required ">
    <label for="name" class="control-label">Kategori</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="group_id" class="form-control select2" name="group_id">
            <option value="#">-- Pilih Kategori --</option>
            @foreach (\App\Model\Kategori::all() as $jp)
            <option value="{{$jp->id}}">{{$jp->nama}}</option>
            @endforeach
        </select>
        </div>
    </div>
</div>
{!! Form::close() !!}
