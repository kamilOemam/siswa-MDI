<?php echo $this->extend('layout/index') ?>

<?php echo $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas</title>
    <style>
        .card {

            margin-top: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-gradient">
                <?php echo $main_title ;?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $title; ?></h5>
                <br><br>
                <a class="btn btn-primary" href="<?php echo base_url() ?>/biodata/tambah"><i
                        class="fas fa-users-cog"></i>Tambah Biodata</a>
                <br><br>
                <table
                    class="table table-striped list-data-siswa table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>IDname</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Cita-Cita</th>
                            <th>Hobi</th>
                            <th>Motivasi</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
            $no=1;
            foreach ($data_biodata as $r) {
             ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $r['nis'];?></td>
                            <td><?php echo $r['nama'];?></td>
                            <td><?php echo $r['idkelas'];?></td>
                            <td><?php echo $r['umur'];?></td>
                            <td><?php echo $r['alamat'];?></td>
                            <td><?php echo $r['citacita'];?></td>
                            <td><?php echo $r['hobi'];?></td>
                            <td><?php echo $r['motivasi'];?></td>
                            <td>
                                <a class="btn btn-outline-success btn-sm"
                                    href="<?php echo base_url(); ?>/biodata/edit/<?php echo $r['idname']; ?>"><i
                                        class="fas fa-edit"></i></a>

                                <a class="btn btn-outline-danger btn-sm"
                                    href="<?php echo base_url(); ?>/biodata/hapus/<?php echo $r['idname']; ?>"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php 
            $no++;
            }
            ?>
                    </tbody>
                </table>

            </div>
        </div>


    </div>
    </div>
    </div>
</body>

</html>

<?php echo $this->endSection() ?>
