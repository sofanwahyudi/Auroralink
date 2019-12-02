<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="pavicon.png" type="image/png">
<style>
body {
  background-image: url("paper.gif");
}
th {
    border: 1px solid #ddd;
    text-align: left;
}
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
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
<div class="center">
<img src="/asset/img/logo.png"  alt="Logo" style="border-bottom:1px solid black;text-decoration:none;color:#000001;">
        <p>TANDA TERIMA SERVIS:{{$model->kode_servis}}<p>
</div>
<div>
    <table width="80%">
    <thead>
    <tr>
            <td width="50%">#Diterima Dari</td>
            <td>#Untuk Servis di</td>
        </tr>
        <tr>
            <td>{{ ($model->team['nama']) }}</td>
            <td>AURORALINK</td>
        </tr>
        <tr>
            <td>{{ ($model->team['alamat']) }}</td>
            <td> Jl Bulak Setro Utara VI/4C Bulak Surabaya</td>
        </tr>
        <tr>
            <td>{{ ($model->team['telepon']) }}</td>
            <td> 081553177408</td>
        </tr>
         <tr>
            <td>{{ ($model->team['email']) }}</td>
            <td>#</td>
        </tr>
        <tr>
        <td style="padding: 1px;">
            <td> support@auroralink.id</td>
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
