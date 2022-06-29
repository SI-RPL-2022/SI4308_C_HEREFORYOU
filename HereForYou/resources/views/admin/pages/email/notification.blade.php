<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi</title>
</head>
<body>
    <h4 style="margin:0;padding-bottom:0">{{ $title }}</h4>
    <p style="margin-top: 10px">
        {{ $description }}
        <table>
            <tr>
                <td>Number</td>
                <td> : </td>
                <td>{{ $data->number }}</td>
            </tr>
            <tr>
                <td>Nama Customer</td>
                <td> : </td>
                <td>{{ $data->user->name ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nama Psikolog</td>
                <td> : </td>
                <td>{{ $data->psychologist->name ?? '-' }}</td>
            </tr>
            <tr>
                <td>Paket</td>
                <td> : </td>
                <td>{{ $data->package ?? '-' }}</td>
            </tr>
            <tr>
                <td>Media</td>
                <td> : </td>
                <td>{{ $data->media ?? '-' }}</td>
            </tr>
            <tr>
                <td>Topik</td>
                <td> : </td>
                <td>{{ $data->topic ?? '-' }}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td> : </td>
                <td>{{ $data->time->translatedFormat('l, d F Y H:i:s') ?? '-' }}</td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td> : </td>
                <td>Rp. {{ number_format($data->cost) ?? '-' }}</td>
            </tr>
            <tr>
                <td>Metode Pembayaran</td>
                <td> : </td>
                <td>{{ $data->bank_name }} - {{ $data->bank_number }}</td>
            </tr>
            <tr>
                <td>Tanggal Pesan</td>
                <td> : </td>
                <td>{{ $data->created_at->translatedFormat('l, d F Y H:i:s') }}</td>
            </tr>
        </table>
        <p style="margin-top:20px">
        Terimakasih telah menggunakan jasa konsultasi kami. <br>
        Semoga permasalahan anda dapat diatasi.</p>
        <p class="margin-top:20px">
            Salam,<br>
            <p style="margin-top: 20px">HereForYou</p>
        </p>
    </p>
</body>
</html>
