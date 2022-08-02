<?php echo $this->extend('layout/index') ?>

<?php echo $this->section('content') ?>

<div class="card" style=" margin-top: 10px;border-radius: 15px;">
    <div class=" card-header bg-gradient">
        <?php echo $main_title ;?>
    </div>
    <div class="card-title">
        <h5><?php echo $title; ?></h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <a class="btn btn-primary" href="<?php echo base_url() ?>/siswa/tambah"><i
                            class="fas fa-user-plus"></i>Tambah
                        Data</a>
                    <a class="btn btn-warning" target="_blank" href="<?php echo base_url() ?>/siswa/cetakData"><i
                            class="fas fa-print"></i>Cetak
                        Data siswa</a>
                    <br><br>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table
                        class="table table-striped list-data-siswa table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>JK</th>
                                <th>TTL</th>
                                <th>SMT</th>
                                <th>Kelas</th>

                                <th style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
            $no=1;
            //   dd($data_siswa);
            foreach ($data_siswa as $r) {
             ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $r['nis'];?></td>
                                <td><?php echo $r['nama'];?></td>
                                <td><?php echo $r['jk'] == 0 ? 'L' : 'P';?></td>
                                <td><?php echo $r['tmp_lahir'].','.$r['tgl_lahir'];?></td>
                                <td><?php echo $r['smt'];?></td>
                                <td><?php echo $r['kelas']."  ".$r['tingkatankls'];?></td>


                                <td>
                                    <a class="btn btn-outline-success btn-sm"
                                        href="<?php echo base_url(); ?>/siswa/edit/<?php echo $r['nis']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a class="btn btn-outline-danger btn-sm"
                                        href="<?php echo base_url(); ?>/siswa/hapus/<?php echo $r['nis']; ?>">
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
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>
