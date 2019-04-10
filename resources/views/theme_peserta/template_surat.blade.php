<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Surat Jemputan Kursus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            padding-top: 5cm;
        }
    </style>
</head>
<body>
    
    <p>Tarikh: {{ \Carbon\Carbon::now()->toFormattedDateString() }}</p>

    <p>{{ $peserta->nama }},</p>
    <p><strong><u>Jemputan menghadiri program {{ $peserta->program->name }}</u></strong></p>
    <p>Merujuk perkara diatas, Tuan / Puan dijemput menghadiri program berikut:</p>
    
    <table>
    <tbody>
        <tr>
            <td>Nama Program</td>
            <td>: {{ $peserta->program->name }}</td>
        </tr>
        <tr>
            <td>Tarikh Mula</td>
            <td>: {{ $peserta->program->tarikh_mula }}</td>
        </tr>
        <tr>
            <td>Tarikh Akhir</td>
            <td>: {{ $peserta->program->tarikh_akhir }}</td>
        </tr>
        <tr>
            <td>Lokasi</td>
            <td>: {{ $peserta->program->lokasi }}</td>
        </tr>
    </tbody>
    </table>
    
    <p>Makanan disediakan sepanjang kursus.</p>
    <p>Sekian, terima kasih.</p>
    <p>
        Yang benar,
        <br>
        Pihak Pengurusan
    </p>
</body>
</html>