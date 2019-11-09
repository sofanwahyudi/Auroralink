{!!Form::model($model, [
    'route' => $model->exists ? ['tickets.update', $model->id] :'tickets.store',
    'method' => $model->exists ? 'PUT':'POST'
])!!}
<div class="box-body">
    <div class="form-group">
        <label for="" class="control-label">Subject</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
            {!! Form::text('subject', null, ['class' => 'form-control', 'id' => 'subject', 'placeholder' => 'Masukan subject']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="" class="control-label">Content</label>
        <div class="input-group">
            {!! Form::textarea('content', null, ['placeholder' => 'type here text', 'id' => 'content', 'class' => 'ckeditor']) !!}
        </div>
    </div>

    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Status</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-filter"></i></div>
        <select id="status_id" class="form-control select" name="status_id">
            <option value="#">-- Pilih Status --</option>
            @foreach (\App\Model\Tickets\Status::all() as $jp)
            <option value="{{$jp->id}}" {{ ( $jp->id == $model->status['id']) ? 'selected' : '' }}>{{$jp->name}}</option>
            @endforeach
        </select>
        </div>
    </div>

    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Prioritas</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-filter"></i></div>
            <select id="priority_id" class="form-control select" name="priority_id">
                <option value="#">-- Pilih Prioritas --</option>
                @foreach (\App\Model\Tickets\Priority::all() as $jp)
                <option value="{{$jp->id}}" {{ ( $jp->id == $model->priority['id']) ? 'selected' : '' }} >{{$jp->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-6 required ">
    <label for="name" class="control-label">Kategori</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-filter"></i></div>
            <select id="cats_id" class="form-control select" name="cats_id">
                <option value="#">-- Pilih Kategori --</option>
                @foreach (\App\Model\Tickets\Cats::all() as $jp)
                <option value="{{$jp->id}}" {{ ( $jp->id == $model->category['id']) ? 'selected' : '' }}>{{$jp->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
{!! Form::close() !!}
