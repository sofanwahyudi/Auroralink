    <div class="row">
            <div class="text-center">
                <img src="/asset/img/logo.png" alt="Logo" style="border-bottom:1px solid black;text-decoration:none;color:#000001;"/>
                <p>TANDA TERIMA SERVIS NO: {{ $model->kode_servis }}<p>
            </div>
    </div>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
        <table><b>DITERIMA DARI</b>
            <tr>
                <td style="padding: 1px;" width="30%">Nama </td>
                <td style="padding: 1px;">:</td>
                <td style="padding: 1px;">{{ ($model->pelanggan['name']) }}</td>
            </tr>
            <tr>
                <td style="padding: 1px;">Alamat</td>
                <td style="padding: 1px;">:</td>
                <td style="padding: 1px;">{!! ($model->pelanggan['alamat'])!!}</td>
            </tr>
            <tr>
                <td style="padding: 1px;">Telepon</td>
                <td style="padding: 1px;">:</td>
                <td style="padding: 1px;">{{ ($model->pelanggan['telepon']) }}</td>
            </tr>
            <tr>
                <td style="padding: 1px;">Email</td>
                <td style="padding: 1px;">:</td>
                <td style="padding: 1px;">{{ ($model->pelanggan['email']) }}</td>
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
        <table><b>DITERIMA OLEH</b>
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
                    <td>
                    {{--  {{ dd($item->perlengkapan) }}  --}}
                    @foreach ($item->perlengkapan as $kel)
                        <span class="badge bg-blue">{{ $kel->nama }}
                    </span>
                    @endforeach
                    </td>
                    {{--  <td>Rp. {{ $item->biaya }},-</td>  --}}
                </tr>
            </tbody>
            @endforeach
</table>
<div class="box-tools">
    <div class='push-left'>
	<a  href="{{ route('servis.pdf', $model->id) }}" class="btn btn-success" role="button" aria-pressed="true"><span class="fa fa-money"></span> Print</a>
</div>
</div>
