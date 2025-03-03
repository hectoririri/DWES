<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cuota #{{ $cuota->id }}</title>
</head>
<body>
    <h1>Factura de Cuota</h1>
    <h2>Cuota #{{ $cuota->id }}</h2>
    <br>
    <h3>Empresa:</h3>
    <p>Albañilería S.L.</p>
    <p><b>CIF:</b> B-12345678</p>
    <p>Calle Covabunga</p>
    <p>Huelva, 21006</p>
    <br>
    <h3>Detalles del Cliente</h3>
    <p><b>Cliente:</b> {{ $cuota->cliente->nombre }}</p>
    <p><b>Fecha de Emisión:</b> {{ $cuota->fecha_emision }}</p>

    <table style="border-collapse: collapse; width: 100%;">
        <tr>
            <th style="border: 1px solid black; padding: 8px;">Concepto</th>
            <th style="border: 1px solid black; padding: 8px;">Importe</th>
            <th style="border: 1px solid black; padding: 8px;">Estado</th>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding: 8px;">{{ $cuota->concepto }}</td>
            <td style="border: 1px solid black; padding: 8px;">{{ $cuota->importe }} €</td>
            <td style="border: 1px solid black; padding: 8px;">
                @if ($cuota->fecha_pago)
                    Pagada el {{ $cuota->fecha_pago }}
                @else
                    Pendiente de pago
                @endif
            </td>
        </tr>
    </table>

    @if ($cuota->notas)
        <h3>Notas</h3>
        <p>{{ $cuota->notas }}</p>
    @endif

    <p>Documento generado automáticamente - {{ date('d/m/Y H:i:s') }}</p>
</body>
</html>