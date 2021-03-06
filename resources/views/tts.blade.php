<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="pavicon.png" type="image/png">
<style>
body {
    background-image: url("https://auroralink.co.id/asset/img/pavicon.png");
    background-repeat: no-repeat;
    opacity: 0.3;
    background-position: center;
    background-size: 30%;
}
.container {
    position: relative;
  }
thead, tbody {
    border: 1px solid #dddd;
    text-align: left;
}
table {
    border-collapse: collapse;
    width: 100%;
}
td, {
    padding: 5px;
}
.center {
	display: block;
	margin-left: auto;
	margin-right: auto;
	width: 50%;
}
</style>
</head>
<body>
<div class="center">
<img src="https://auroralink.id/asset/img/logo.png">
        <p>TANDA TERIMA SERVIS: #{{$model->kode_servis}}<p>
</div>
<div>
    <table width="80%">
    <thead>
    <tr>
            <td width="50%">#Diterima Dari</td>
            <td>#Untuk Servis di</td>
        </tr>
        <tr>
            <td>{{ ($model->pelanggan->name) }}</td>
            <td>AURORALINK</td>
        </tr>
        <tr>
            <td>{!! ($model->pelanggan->alamat) !!}</td>
            <td> Jl Bulak Setro Utara VI/4C Bulak Surabaya</td>
        </tr>
        <tr>
            <td>{{ ($model->pelanggan->telepon) }}</td>
            <td> 08113190408</td>
        </tr>
         <tr>
            <td>{{ ($model->pelanggan->email) }}</td>
            <td> support@auroralink.id</td>
        </tr>
        <tr>
    </tr>
        </thead>
    </table>
</div>
<div>
    <table>
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
                        {{ ($item->merk->name) }}
                    </td>
                    <td>{{ $item->serial_number }}</td>
                    <td>{{ $item->warna }}</td>
                    <td>{{ $item->garansi->nama }}</td>
                    <td>{{ $item->keluhan }}</td>
                    <td>
                    @foreach ($item->perlengkapan as $kel)
                        <span class="badge bg-blue">{{ $kel->nama }},
                    </span>
                    @endforeach
                    </td>
                     {{-- <td>Rp. {{ $item->biaya }},-</td> --}}
                </tr>
        </tbody>
        @endforeach
</table>
<div>
<br>
    <table width="100%">
    <thead>
    <tr>
            <td width="80%"></td>
            <td>Sby,  {{ date('d-m-Y') }}</td>
        </tr>
    <tr>
        <td width="80%"></td>
        <td>Diterima Oleh,</td>
    </tr>
        <tr>
            <td width="80%"><br></td>
            <td></td>
        </tr>
    <tr>
            <td width="80%"></td>
            <td></td>
        </tr>
        <tr>
            <td width="80%"><br></td>
            <td></td>
        </tr>
    <tr>
            <td width="80%">Pelanggan</td>
            <td>Teknisi/Admin</td>
        </tr>

        </thead>
    </table>
</div>
</div>
</body>
</html>
