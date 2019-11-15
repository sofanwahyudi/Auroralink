{!!Form::model($model, [
    'route' => $model->exists ? ['models.update', $model->id] :'models.store',
    'method' => $model->exists ? 'PUT':'POST',
])!!}
<div class="box-body">
    <div class="form-group col-md-6">
        <label for="" class="control-label">Merk</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
        </div>
    </div>
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Merk</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="merk_id" class="form-control select" name="merk_id">
            <option value="#">-- Pilih Merk --</option>
            @foreach (\App\Model\Merk::all() as $jp)
            <option value="{{$jp->id}}" {{ ( $jp->id == $model->merk['id']) ? 'selected' : '' }}>{{$jp->name}}</option>
            @endforeach
        </select>
        </div>
    </div>
</div>
{!! Form::close() !!}
