<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Siswa | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets')?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets')?>/dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url('assets')?>/index2.html" class="h1"><b>Login User</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Please Login</p>

                <?= form_open('login/cekUser') ?>
                <?= csrf_field() ?>
                <div class="input-group mb-3">
                    <?php 
                        // if (session()->getFlashdata('errIdUser')) {
                        //     $isInvalidUser = 'is-invalid';
                        // }else{
                        //     $isInvalidUser = '';
                        // }
                        $isInvalidUser = (session()->getFlashdata('errIdUser')) ? 'is-invalid' : '';
                    ?>
                    <input type="text" name="iduser" id="iduser" class="form-control <?= $isInvalidUser ?>"
                        placeholder="Input ID User" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <?php 
                    if (session()->getFlashdata('errIdUser')) {
                        echo '<div id="validationServer03Feedback" class="invalid-feedback">
                       ' . session()->getFlashdata('errIdUser') . '
                      </div>';
                    }
                    ?>
                </div>
                <div class="input-group mb-3">
                    <?php 
                     $isInvalidPassword= (session()->getFlashdata('errPassword')) ? 'is-invalid' : '';
                    ?>
                    <input type="password" class="form-control <?= $isInvalidPassword?>" placeholder="Password"
                        name="pass" id="pass">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <?php 
                    if (session()->getFlashdata('errPassword')) {
                        echo '<div id="validationServer03Feedback" class="invalid-feedback">
                       ' . session()->getFlashdata('errPassword') . '
                      </div>';
                    }
                    ?>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-block btn-success">
                        <i class="fas fa-door-open"></i>ogin
                    </button>

                </div>
            </div>
        </div>

        <?= form_close() ?>


    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets')?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets')?>/dist/js/adminlte.min.js"></script>


</body>

</html>
