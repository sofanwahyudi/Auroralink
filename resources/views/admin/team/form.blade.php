{!!Form::model($model, [
    'route' => $model->exists ? ['team.update', $model->id] :'team.store',
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
        <label for="" class="control-label">Alamat</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::text('alamat', null, ['class' => 'form-control', 'id' => 'alamat', 'placeholder' => 'Masukan Alamat']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Email</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Masukan Email']) !!}
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="" class="control-label">Telepon</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-edit"></i></div>
            {!! Form::text('telepon', null, ['class' => 'form-control', 'id' => 'telepon', 'placeholder' => 'Masukan Telepon']) !!}
        </div>
    </div>
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Departemen</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="dept_id" class="form-control select2" name="dept_id">
            <option value="#">-- Pilih Departemen --</option>
            @foreach (\App\Model\Dept::all() as $jp)
            <option value="{{$jp->id}}" selected="selected">{{$jp->name}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Devisi</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="devisi_id" class="form-control select2" name="devisi_id">
            <option value="#">-- Pilih Devisi --</option>
            @foreach (\App\Model\Devisi::all() as $jp)
            <option value="{{$jp->id}}" selected="selected" >{{$jp->name}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">User</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="users_id" class="form-control select2" name="users_id">
            <option value="#">-- Pilih User --</option>
            @foreach (\App\User::all() as $jp)
            <option value="{{$jp->id}}" selected="selected" >{{$jp->name}}</option>
            @endforeach
        </select>
        </div>
    </div>
</div>
{!! Form::close() !!}
