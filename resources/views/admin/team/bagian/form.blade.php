{!!Form::model($model, [
    'route' => $model->exists ? ['bagian.update', $model->id] :'bagian.store',
    'method' => $model->exists ? 'PUT':'POST',
])!!}
<div class="box-body">
    <div class="form-group ">
        <label for="" class="control-label">Nama</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama']) !!}
        </div>
    </div>
     <div class="form-group">
     <label for="bagian" class="control-label"><span class="fa fa-user"></span>  Devisi</label>
        <div class="form-check">
            @foreach(\App\Model\Devisi::all()  as $r)
                <div class="col-sm-6">
                {{ Form::radio('devisi_id', $r->id, $model->devisi($r->id) ? false : true) }}
                {{  $r->name }}
                </div>
                @endforeach
        </div>
    </div>
</div>
{!! Form::close() !!}
