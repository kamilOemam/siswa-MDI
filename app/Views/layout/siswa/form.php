<?php echo $this->extend('layout/index') ?>
<?php echo $this->section('content') ?>
<div class="card" style="margin-top: 10px;border-radius: 15px">
    <div class="card-header">
        <?php echo $main_title ;?>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?php echo $title; ?></h5>
        <br><br>
        <?php 
    if (!empty(session()->getFlashdata('error'))) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo session()->getFlashdata('error'); ?>
        </div>
        <?php 
    }
    
    ?>


        <form action="<?= $action;?>" method="POST">
            <?php 
    $readonly = current_url(true)->getSegment(3) == 'edit' ? 'readonly="true"' : ''
    ?>
            <div class="mb-3">
                <div class="row">
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="nis" class="form-label">NIS</label>

                        <input name="nis" type="text" class="form-control" id="nis"
                            value="<?php echo $data[0]['nis'];?>" <?php echo $readonly ?>>
                    </div>
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="nama" class="form-label">Nama</label>
                        <input name="nama" type="text" class="form-control" id="nama"
                            value="<?php echo $data[0]['nama'];?>">

                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="nis" class="form-label">JK</label>
                        <div>
                            <?php 
                        if (current_url(true)->getSegment(3) == 'edit') {
                            $checkedL  = $data[0]['jk'] == 0 ? 'checked' : '';
                            $checkedP  = $data[0]['jk'] == 1 ? 'checked' : '';
                        }else {
                            $checkedL = '';
                            $checkedP = '';
                        }
                        ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="laki" value="0"
                                    <?php echo $checkedL; ?>>
                                <label class="form-check-label" for="laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="perempuan" value="1"
                                    <?php echo $checkedP; ?>>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="idkelas" class="form-label">Kelas</label>
                        <select class="form-control" name="idkelas" id="idkelas">
                            <option value="">Pilih Kelas</option>
                            <?php 
                        foreach ($data_kelas as $r) {
                            ?>
                            <option value="<?php echo $r['idkelas']; ?>"
                                <?php echo $r['idkelas'] == $data[0]['idkelas'] ? 'selected' : ''; ?>>
                                <?php  echo $r['kelas']."  ".$r['tingkatankls'];?>
                            </option>
                            <?php 
             }
                        ?>
                        </select>
                    </div>
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="idsmt" class="form-label">Semester</label>
                        <select class="form-control" name="idsmt" id="idsmt">
                            <option value="">Pilih Semester</option>
                            <?php 
                            if (current_url(true)->getSegment(3)=='edit') {
                               foreach ($data_semester as $s ) {
                                   $selected = $data[0]['idsmt'] == $s['idsmt'] ? 'selected="selected"' : '';
                        ?>
                            <option value="<?php echo $s['idsmt']?>" <?php echo $selected; ?>><?php echo $s['smt']?>
                            </option>
                            <?php
                               }
                            }
                            ?>
                        </select>
                    </div>
                </div>

            </div>



            <div class="mb-3">
                <div class="row">
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="tmp_lahir" class="form-label">Tempat lahir</label>
                        <input name="tmp_lahir" type="text" class="form-control" id="tmp_lahir"
                            value="<?php echo $data[0]['tmp_lahir'];?>">
                    </div>

                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="tgl_lahir" class="form-label">Tgl lahir</label>
                        <input name="tgl_lahir" type="date" class="form-control" id="tgl_lahir"
                            value="<?php echo $data[0]['tgl_lahir'];?>">
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-user-check"></i> Submit</button>
        </form>
    </div>
</div>
<?php echo $this->endSection() ?>
