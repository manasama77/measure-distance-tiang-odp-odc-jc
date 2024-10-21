<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>BRANCH</th>
                <th>JENIS TIANG</th>
                <th>MILIK</th>
                <th>NAMA TIANG</th>
                <th>LATTITUDE</th>
                <th>LONGITUDE</th>
                <th>KETERANGAN</th>
                <th>ODP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $tiangs as $t)
            <tr>
                <td>{{ $t->branch }}</td>
                <td>{{ $t->jenis_tiang }}</td>
                <td>{{ $t->milik }}</td>
                <td>{{ $t->nama_tiang }}</td>
                <td>{{ $t->lat }}</td>
                <td>{{ $t->lng }}</td>
                <td>{{ $t->keterangan }}</td>
                <td>
                    @php
                    $odps = '';
                    foreach ($t->odp_to_tiang as $ott) {
                    $odps .= $ott->odp->code . ', ';
                    }
                    $odps = rtrim($odps, ', ');

                    echo $odps;
                    @endphp
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
