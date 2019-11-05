<div class="text-center">
</div><!--text-center -->
<div class="modal-body">
    <div class="box-body">
            <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td><b>Nik </b></td>
                            <td>{{$model->nik}}</td>
                        </tr>
                        <tr>
                            <td><b>Nama </b></td>
                            <td>{{$model->nama}}</td>
                        </tr>
                        <tr>
                            <td><b>Alamat </b></td>
                            <td>{{ $model->alamat }}</td>
                        </tr>
                        <tr>
                            <td><b>Email </b></td>
                            <td>{{ $model->email }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td><b>Telepon </b></td>
                            <td>{{$model->telepon}}</td>
                        </tr>
                        <tr>
                            <td><b>Devisi </b></td>
                            <td>{{ $model->devisi['name'] }}</td>
                        </tr>
                        <tr>
                            <td><b>Bagian</b></td>
                            <td>{{ $model->bagian['nama'] }}</td>
                        </tr>
                        <tr>
                            <td><b>User </b></td>
                            <td>{{ $model->users['name'] }}</td>
                        </tr>
                    </table>
                </div>
    </div><!-- box-body-->
</div><!-- modal-body-->
