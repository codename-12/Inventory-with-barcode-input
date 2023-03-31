<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR LABEL</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>

    </style>
</head>
<body>
    <div class="container">
        <table class="editorDemoTable" style="height: 89px; width: 362px; vertical-align: top; border-style: solid;">
            <thead>
            <tr style="height: 23px;">
            <td style="background-color: rgba(0, 0, 0, 0.1 ); height: 23px; width: 227.812px;" colspan="2">PT TRIDAYAMAS SINARPUSAKA</td>
            <td style="background-color: rgba(0, 0, 0, 0.1 ); width: 133.387px; height: 23px;">{{ $regkain_polos->created_at->format('D, d M Y') }}</td>
            </tr>
            </thead>
            <tbody>
            <tr style="height: 16px;">
            <td style="min-width: 140px; height: 150px; width: 225px; text-align: center;" rowspan="5">
                <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG(''. $regkain_polos->kode_kain, 'QRCODE')  }}" alt="QR CODE" width="100" height="100" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; display: block; margin-left: auto; margin-right: auto;" />
                <br/>
                <br/>
                {{ $regkain_polos->kode_kain }}
                </td>
            <td style="height: 16px; width: 87.8125px;">KOP</td>
            <td style="width: 133.387px; height: 16px;">{{ $regkain_polos->no_kop->NO_KOP }}</td>
            </tr>
            <tr style="height: 10px;">
            <td style="height: 10px; width: 87.8125px;">Warna</td>
            <td style="width: 133.387px; height: 10px;">{{ $regkain_polos->warna }}</td>
            </tr>
            <tr style="height: 10px;">
            <td style="height: 10px; width: 87.8125px;">LOT</td>
            <td style="width: 133.387px; height: 10px;">{{ $regkain_polos->LOT }}</td>
            </tr>
            <tr style="height: 20px;">
            <td style="height: 20px; width: 87.8125px;">ROL</td>
            <td style="width: 133.387px; height: 20px;">{{ $regkain_polos->ROL }}</td>
            </tr>
            <tr style="height: 10px;">
            <td style="height: 10px; width: 87.8125px;">KG</td>
            <td style="width: 133.387px; height: 10px;">{{ number_format($regkain_polos->KG) }}</td>
            </tr>
            </tbody>
            </table>
        <table>
          
</body>
</html>