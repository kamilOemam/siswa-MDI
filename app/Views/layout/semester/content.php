<?php echo $this->extend('layout/index') ?>

<?php echo $this->section('content') ?>


<div class="card" style="margin-top: 10px;border-radius: 15px; border-color: palegoldenrod;">
    <div class="card-header">
        <?php echo $main_title ;?>
    </div>
    <div class="card-body">
        <div class="card-title">
            <h5><?php echo $title; ?></h5>
            <br>
            <a class="btn btn-primary" href="<?php echo base_url() ?>/semester/tambah"><i
                    class="far fa-plus-square"></i> Tambah Data</a>
            <br><br>
        </div>

        <table class="table table-striped table-bordered  list-data-semester">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kd</th>
                    <th>Semester</th>
                    <th>Kelas</th>
                    <th style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $no=1;
            // dd('$data_semester');
            foreach ($data_semester as $r) {
             ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $r['idsmt'];?></td>
                    <td><?php echo $r['smt'];?></td>
                    <td><?php echo $r['kelas']."  ".$r['tingkatankls'];?></td>

                    <td>
                        <a class="btn btn-outline-success btn-sm"
                            href="<?php echo base_url(); ?>/semester/edit/<?php echo $r['idsmt']; ?>">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a class="btn btn-outline-danger btn-sm"
                            href="<?php echo base_url(); ?>/semester/hapus/<?php echo $r['idsmt']; ?>">
                            <i class="fas fa-trash"></i>
                        </a>
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

<?php echo $this->endSection() ?>
