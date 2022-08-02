<?php echo $this->extend('layout/index') ?>

<?php echo $this->section('content') ?>



<div class="card" style=" margin-top: 10px" ;>
    <div class="card-header">
        Beranda
    </div>
    <div class="card-body">


        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Welcome Bro!</h5>
            Ini adalah beranda data
        </div>
        <section class="content">

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-exclamation-triangle"></i>
                                Perhatian
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i>Peringatan!</h5>
                                Tidak boleh melakukan hal-hal yang telah dilarang sesuai kesepakatan sekolah ! Dan
                                berhati-hatilah saat
                                mengisi data. Karena kesalahan data bia berakibat <strong><i>Fatal</i></strong> bagi
                                administrasi
                                siswa
                            </div>
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i> Catatan... </h5>
                                <strong>Admin</strong> bisa mengakses <u>apapun</u>, <strong>siswa</strong> hanya bisa
                                mengakses
                                <u>biodata</u> sedangkan <strong>staff</strong> bisa
                                mengakses <u>input data siswa</u> saja...
                            </div>

                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Semoga Sukses!</h5>
                                <strong> " Semangat dan berjuang untuk sebuah harapan dan masa depan !! " </strong>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-bullhorn"></i>
                                Input Data
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">

                                <div class=" col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>Kelas</h3>

                                            <p>Data</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-university"></i>
                                        </div>
                                        <a href="#" class="small-box-footer"><i class="far fa-address-card"></i></a>
                                    </div>
                                </div>
                                <div class=" col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>Semester</h3>

                                            <p>Data</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fab fa-battle-net"></i>
                                        </div>
                                        <a href="#" class="small-box-footer"><i class="far fa-address-card"></i></a>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class=" col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>Siswa</h3>

                                            <p>Data</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <a href="#" class="small-box-footer"><i class="far fa-address-card"></i></a>
                                    </div>
                                </div>
                                <div class=" col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>Biodata</h3>

                                            <p>Siswa</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-theater-masks"></i>
                                        </div>
                                        <a href="#" class="small-box-footer"><i class="far fa-address-card"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>




            <!-- Default box -->



            <!-- /.card -->

        </section>


    </div>
</div>



<?php echo $this->endSection() ?>
