<div class="text-center">
    <img src="{{$model->getGambar()}}" class="img-fluid"><br><br>
</div><!--text-center -->
<div class="modal-body">
    <div class="box-body">
            <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td><b>Nama </b></td>
                            <td>{{$model->nama}}</td>
                        </tr>
                        <tr>
                            <td><b>Deskripsi </b></td>
                            <td>{!! $model->deskripsi !!}</td>
                        </tr>
                        <tr>
                            <td><b>Jam Support </b></td>
                            <td>{{ $model->jam['nama']}}</td>
                        </tr>
                        <tr>
                            <td><b>Fitur </b></td>
                            <td>{!! $model->fitur !!}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td><b>Benefit </b></td>
                            <td>{!! $model->benefit !!}</td>
                        </tr>
                        <tr>
                            <td><b>Harga </b></td>
                            <td>Rp. {{number_format($model->harga, 0, '.', '.') }}</td>
                        </tr>
                        <tr>
                            <td><b>Kategori Jasa</b></td>
                            <td>{{ $model->job['nama'] }}</td>
                        </tr>
                    </table>
                </div>
    </div><!-- box-body-->
</div><!-- modal-body-->
