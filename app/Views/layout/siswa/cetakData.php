<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
</head>
<style>
    .kop-surat {
        text-align: center;
    }

    .p {
        line-height: 0.2;
    }

    .kop1 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.5em;
        font-weight: bold;
    }

    .kop2 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.2em;
        font-weight: bold;
    }

    .kop1 {
        font-family: 'Times New Roman', Times, serif;
        font-size: normal;
        font-weight: bold;
    }

    .garis {
        border-bottom: 1px solid #000;
    }

    table {
        display: table;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        text-align: center;
    }

    table,
    td,
    th {
        border: 1px solid #000;
    }
</style>

<body>
    <h3 style="text-transform: uppercase; text-decoration: underline; text-align: center;">Data Mahasiswa</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Semester</th>
                <th>Kelas</th>
                <th>TTL</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
           foreach ($data as $r ) {
               ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['nis'];?></td>
                <td><?php echo $r['nama'];?></td>
                <td><?php echo $r['jk'] == 0 ? 'L' : 'P';?></td>
                <td><?php echo $r['smt'];?></td>
                <td><?php echo $r['kelas']." ".$r['tingkatankls'];?></td>
                <td><?php echo $r['tmp_lahir'] . ', ' . $r['tgl_lahir'];?></td>
            </tr>
            <?php 
            $no++;
         }
            ?>
        </tbody>
    </table>
</body>

</html>
