<?php echo $this->extend('layout/index') ?>
<?php echo $this->section('content') ?>


<div class="card" style="margin-top: 10px;border-radius: 15px;">
    <div class="card-header">
        <?php echo $main_title ;?>
    </div>
    <div class="card-body">
        <h5 class="card-title"></h5>

        <?php 
    if (!empty(session()->getFlashdata('error'))) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo session()->getFlashdata('error'); ?>
        </div>
        <?php 
    } 
    $readonly = current_url(true)->getSegment(3) == 'edit'?'readonly="true"' : '';
    ?>

        <form action="<?= $action;?>" method="POST">


            <div class="mb-3">
                <div class="row">
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="nis" class="form-label">NIS</label>
                        <select class="form-control" name="nis" id="nis">
                            <option value="">Pilih NIS</option>
                            <?php 
                        foreach ($data_siswa as $r) {
                            ?>
                            <option value="<?php echo $r['nis']; ?>"
                                <?php echo $r['nis'] == $data[0]['nis'] ? 'selected' : ''; ?>>
                                <?php  echo $r['nis']."  ".$r['nama'];?>
                            </option>
                            <?php 
             }
                        ?>
                        </select>
                    </div>
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="text" class="form-control" id="umur" name="umur"
                            value="<?php echo $data[0]['umur'];?>">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="<?php echo $data[0]['alamat'];?>">
                    </div>
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="citacita" class="form-label">Cita-Cita</label>
                        <input type="text" class="form-control" id="citacita" name="citacita"
                            value="<?php echo $data[0]['citacita'];?>">
                    </div>
                </div>
            </div>
            <input name="idname" type="hidden" class="form-control" id="idname" value="<?= $data[0]['idname'] ?>">
            <div class="mb-3">
                <div class="row">
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="hobi" class="form-label">Hobi</label>
                        <input type="text" class="form-control" id="hobi" name="hobi"
                            value="<?php echo $data[0]['hobi'];?>">
                    </div>
                    <div class="col col-xl-6 col-sm-12 col-xs-12">
                        <label for="motivasi" class="form-label">Motivasi</label>
                        <input type="text" class="form-control" id="motivasi" name="motivasi"
                            value="<?php echo $data[0]['motivasi'];?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary "></i> Submit</button>
        </form>
    </div>

</div>

<?php echo $this->endSection() ?>
