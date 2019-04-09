<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <p>Hi {{ $nama_peserta }},</p>
    <p>Anda telah dijemput untuk menyertai program berikut:</p>
    <ul>
        <li>Program: {{ $nama_program }}</li>
        <li>Tarikh Mula: {{ $tarikh_mula }}</li>
        <li>Tarikh Akhir: {{ $tarikh_akhir }}</li>
        <li>Lokasi: {{ $lokasi }}</li>
    </ul>
    <p>Jika ada sebarang pertanyaan, sila hubungi {{ $bantuan_phone }} atau email ke {{ $bantuan_email }}.
    <p>Sekian, terima kasih.</p>
    <p>Yang Benar,
    <br>
    {{ $pengurusan }}
    <br>
    {{ $nama_aplikasi }}
    <br>
    {{ $link_aplikasi }}
    </p>
</body>
</html>