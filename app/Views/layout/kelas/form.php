<?php echo $this->extend('layout/index') ?>
<?php echo $this->section('content') ?>

<div class="card" style="margin-top: 10px;border-radius: 15px;">
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
    $readonly = current_url(true)->getSegment(3) == 'edit'?'readonly="true"' : '';
    ?>


        <form action="<?= $action;?>" method="POST">
            <div class="mb-3">
                <label for="idkelas" class="form-label">Kode Kelas</label>
                <input name="idkelas" type="idkelas" class="form-control" id="idkelas" <?php echo $readonly; ?>
                    value="<?php echo $data[0]['idkelas'];?>">

            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $data[0]['kelas'];?>">
            </div>
            <div class="mb-3">
                <label for="tingkatankls" class="form-label">Tingkat</label>
                <input type="text" class="form-control" id="tingkatankls" name="tingkatankls"
                    value="<?php echo $data[0]['tingkatankls'];?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php echo $this->endSection() ?>
