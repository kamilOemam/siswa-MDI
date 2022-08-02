<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Codeigniter 4</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/datatables/dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.css')?>">
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js')?>"></script>
    <script>
        var base_url = "<?php echo base_url(); ?>";
    </script>
</head>

<body>
    <div class="container">
        <?php echo $this->include('layout/menu') ?>
        <!-- end header -->
        <!-- content -->
        <?php echo $this->renderSection('content');?>
        <!-- end content -->
        <!-- footer -->
        <p class="text-center">&copy; 2022 Madrasah I'dadiyah</p>
        <!-- end footer -->

    </div>
    <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>/assets/fontawesome/js/all.js"></script>
    <script src="<?= base_url() ?>/assets/datatables/dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js')?>"></script>

    <script>
        // console.log(1);
        $(document).ready(function () {
            $('.list-data-kelas').DataTable();
            // $('.list-data-biodata').DataTable();
            $('.list-data-semester').DataTable();
            $('.list-data-siswa').DataTable();
            $('#idkelas').on('change', function () {
                var kelas = $(this).val();
                $("#idsmt").html('');
                $.post(base_url + '/siswa/getSmt', {
                        idkelas: kelas
                    },
                    function (hasil) {
                        console.log(3);
                        var hasil = JSON.parse(hasil);
                        $("#idsmt").html('<option value="">Pilih Semester</option>')

                        $.each(hasil, function (i, t) {
                            $("#idsmt").append('<option value="' + t.idsmt + '">' + t.smt +
                                '</option>')
                        });
                    });
            });
        });
    </script>
</body>

</html>
