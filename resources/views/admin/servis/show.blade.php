    <div class="row">
            <div class="text-center">
                <img src="/asset/img/logo.png" alt="Logo" style="border-bottom:1px solid black;text-decoration:none;color:#000001;"/>
                <p>TANDA TERIMA SERVIS NO: {{ $model->kode_servis }}<p>
            </div>
    </div>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
        <table>#DITERIMA DARI
            <tr>
                <td style="padding: 1px;">No.Servis</td>
                <td style="padding: 1px;">: </td>
                <td style="padding: 1px;"> {{ $model->kode_servis }}</td>
            </tr>
            <tr>
                <td style="padding: 1px;" width="30%">Nama </td>
                <td style="padding: 1px;">:</td>
                <td style="padding: 1px;">{{ ($model->team['nama']) }}</td>
            </tr>
            <tr>
                <td style="padding: 1px;">Alamat</td>
                <td style="padding: 1px;">:</td>
                <td style="padding: 1px;">{{ ($model->team['alamat']) }}</td>
            </tr>
            <tr>
                <td style="padding: 1px;">Telepon</td>
                <td style="padding: 1px;">:</td>
                <td style="padding: 1px;">{{ ($model->team['telepon']) }}</td>
            </tr>
            <tr>
                <td style="padding: 1px;">Email</td>
                <td style="padding: 1px;">:</td>
                <td style="padding: 1px;">{{ ($model->team['email']) }}</td>
            </tr>
            <tr>
                <td style="padding: 1px;">Status</td>
                <td style="padding: 1px;">:</td>
                <td style="padding: 1px;"><span class="badge bg-{{ ($model->status['warna']) }}">
                {{ ($model->status['name']) }}</span>
                </td>
            </tr>
        </table>
</div>
    <div class="col-md-6">
        <table>#DITERIMA OLEH
            <tr>
                <td style="padding: 1px;" width="30%">AURORALINK</td>
            </tr>
            <tr>
                <td style="padding: 1px;"> 081553177408</td>
            </tr>
            <tr>
                <td style="padding: 1px;"> support@auroralink.id</td>
            </tr>

            <tr>
                <td style="padding: 1px;">{{ $model->team['nama'] }}</td>
            </tr>
            <tr>
                <td style="padding: 1px;">{{ $model->created_at }}</td>
            </tr>
        </table>
    </div>
</div>
</div>

 <table class="table table-bordered">
        <thead>
            <tr>
                <td><b>No </b></td>
                <td><b>Merk</b></td>
                <td><b>Serial Number</b></td>
                <td><b>Warna</b></td>
                <td><b>Garansi</b></td>
                <td><b>Keluhan</b></td>
                <td><b>Kelengkapan</b></td>
            </tr>
            </thead>
            @foreach ($model->device as $key => $item)
            <tbody>
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        {{ ($item->merk['name']) }}
                    </td>
                    <td>{{ $item->serial_number }}</td>
                    <td>{{ $item->warna }}</td>
                    <td>{{ $item->garansi['nama'] }}</td>
                    <td>{{ $item->keluhan }}</td>
                    <td><span class="badge bg-blue">
                    {{--  {{ dd($item->perlengkapan) }}  --}}
                    @foreach ($item->perlengkapan as $kel)
                        #{{ $kel->name }}
                    @endforeach
                    </span></td>
                    {{--  <td>Rp. {{ $item->biaya }},-</td>  --}}
                </tr>
            </tbody>
            @endforeach
</table>
{{--  <div class="box-tools">
    <div class='push-left'>
	<a  href="#" class="btn btn-success" role="button" aria-pressed="true"><span class="fa fa-money"></span> Bayar</a>
</div>
</div>  --}}
