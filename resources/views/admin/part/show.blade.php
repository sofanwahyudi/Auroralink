<div class="text-center">
    <h3><img src="data:image/png;base64,{{DNS1D::getBarcodePNG($model->barcode, 'C39')}}" height="30" width="200"><span style="margin: 19px;"></h3>
    <img src="{{$model->getGambar()}}" class="img-fluid"><br><br>
</div><!--text-center -->
<div class="modal-body">
    <div class="box-body">
            <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td><b>Sku </b></td>
                            <td>{{$model->sku}}</td>
                        </tr>
                        <tr>
                            <td><b>Nama </b></td>
                            <td>{{$model->nama}}</td>
                        </tr>
                        <tr>
                            <td><b>Deskripsi </b></td>
                            <td>{{ $model->deskripsi }}</td>
                        </tr>
                        <tr>
                            <td><b>berat </b></td>
                            <td>{{ $model->berat }} gram</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td><b>Harga Jual </b></td>
                            <td>Rp. {{ number_format($model->harga_jual)}}</td>
                        </tr>
                        <tr>
                            <td><b>Harga Beli </b></td>
                            <td>Rp. {{ number_format($model->harga_beli) }}</td>
                        </tr>
                        <tr>
                            <td><b>Supplier </b></td>
                            <td>{{ $model->supplier['nama'] }}</td>
                        </tr>
                        <tr>
                            <td><b>Kategori </b></td>
                            <td>{{ $model->kategori['nama'] }}</td>
                        </tr>
                        <tr>
                            <td><b>Merk </b></td>
                            <td>{{ $model->merk['nama'] }}</td>
                        </tr>
                    </table>
                </div>
    </div><!-- box-body-->
</div><!-- modal-body-->
