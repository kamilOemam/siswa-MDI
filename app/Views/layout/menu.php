<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="border-radius:0px 0px 20px 20px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= site_url('/home/index') ?>" style="color: green;"><b>Madrasah
                I'dadiyah</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (session()->idlevel == 1) : ?>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= site_url('/home/index') ?>">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/kelas/index') ?>">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/semester/index') ?>">Semester</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/siswa/index') ?>">Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/biodata/index') ?>">Biodata Siswa</a>
                </li>

                <?php endif; ?>
                <?php if (session()->idlevel == 2) : ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= site_url('/home/index') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/biodata/index') ?>">Biodata Siswa</a>
                </li>
                <?php endif; ?>
                <?php if (session()->idlevel == 3) : ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= site_url('/home/index') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/kelas/index') ?>">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/semester/index') ?>">Semester</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/siswa/index') ?>">Siswa</a>
                </li>
                <?php endif; ?>


            </ul>
            <ul>
                <li class="nav-item dropdown  list-inline float-right " style="float: right;">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 medium">
                            <?= session()->namauser?>
                        </span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets')?>/img/default2.svg"
                            style="height:  30px; width: 30px;">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= site_url('/profile/index'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= site_url('login/keluar') ?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
