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
    
    ?>

        <form action="<?= $action;?>" method="POST">
            <?php 
    if (current_url(true)->getSegment(3) == 'edit') {
        ?>
            <input type="hidden" name="params" id="params" value="<?php echo $data[0]['idsmt'];?>">
            <?php 
    }
    ?>
            <div class="mb-3">
                <label for="smt" class="form-label">Semester</label>
                <input name="smt" type="text" class="form-control" id="smt" value="<?php echo $data[0]['smt'];?>">

            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-control" name="idkelas" id="idkelas">
                    <option value="">Pilih Kelas</option>
                    <?php 
            foreach ($data_kelas as $r) {
               ?>
                    <option value="<?php echo $r['idkelas']; ?>"
                        <?php echo $r['idkelas'] == $data[0]['idkelas'] ? 'selected' : ''; ?>>
                        <?php  echo $r['kelas']; ?>
                        <?php  echo $r['tingkatankls']; ?>
                    </option>
                    <?php 
            }
            ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php echo $this->endSection() ?>
