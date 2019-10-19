<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('vendor/css/simple-sidebar.css') ?>" rel="stylesheet">

    <!-- Font Aweesome -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css') ?>">

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light bordered" id="sidebar-wrapper">
            <div class="sidebar-heading font-weight-bolder text-secondary"><a class="text-secondary text-decoration-none" href="<?= base_url('home') ?>">PC Assembling <i class="fas fa-desktop"></i></a></div>
            <div class="list-group list-group-flush">
                <a href="<?= base_url('home') ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a class="dropdown">
                    <a class="dropdown-toggle list-group-item list-group-item-action bg-light" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href=""><i class="far fa-circle"></i> Master Data</a>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?= base_url('master/processor') ?>">Processor</a>
                    <a class="dropdown-item" href="<?= base_url('master/motherboard') ?>">Motherboard</a>
                    <a class="dropdown-item" href="<?= base_url('master/ram') ?>">RAM</a>
                    <a class="dropdown-item" href="<?= base_url('master/hardisk') ?>">Hardisk</a>
                    <a class="dropdown-item" href="<?= base_url('master/ssd') ?>">SSD</a>
                    <a class="dropdown-item" href="<?= base_url('master/casing') ?>">Casing</a>
                    <a class="dropdown-item" href="<?= base_url('master/vga') ?>">VGA</a>
                    <a class="dropdown-item" href="<?= base_url('master/psu') ?>">PSU</a>
                    <a class="dropdown-item" href="<?= base_url('master/keyboard') ?>">Keyboard</a>
                    <a class="dropdown-item" href="<?= base_url('master/mouse') ?>">Mouse</a>
                    <a class="dropdown-item" href="<?= base_url('master/monitor') ?>">Monitor</a>
                </div>
                </a>
                <a href="<?= base_url('home/app') ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-microchip"></i> Rakit PC</a>
                <a href="<?= base_url('home/result') ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-database"></i> My PC</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user text-secondary"></i>
                                <?= $this->session->userdata('username'); ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-left" href=""><i class="fas fa-id-card-alt"></i> Profile</a>
                                <a class="dropdown-item text-left" href="#"><i class="fas fa-user-cog"></i> Setting</a>
                                <a class="dropdown-item text-left" href="#"><i class="fas fa-network-wired"></i> Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-left" href="<?= base_url('login/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <div class="col-12 mt-4">
                    <table class="table table-light">
                        <tr>
                            <div class="input-group">
                                <form method="post" action="<?= base_url('home/pencarian') ?>">
                                    <input type="text" class="form-control col-9 rounded text-secondary font-weight-bold" name="keyword" placeholder="Pencarian">
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text rounded"><a href=""><i class=" fas fa-search text-dark"></i></a></button>
                                    </div>
                                </form>
                                <form action="<?= base_url('master/tambah_monitor') ?>" method="post">
                                    <button type="submit" class="btn btn-primary ml-auto">
                                        <i class="fas fa-plus"></i> Tambah
                                    </button>
                                </form>
                            </div>
                        </tr>
                    </table>
                </div>
                <div class="col-12 mt-4">
                    <div class="border-0">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="20px" class="text-center" scope="col">No</th>
                                    <th scope="col">Monitor</th>
                                    <th width="200px" class="text-center" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            foreach ($master as $r) {
                                ?>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-secondary text-center"><?= $no++ ?></th>
                                    <td class="font-weight-bold text-secondary"><?= $r->monitor ?></td>
                                    <td class="text-center"><a style="height:30px; width:90px; font-size:15px; padding:3px;" class="btn btn-danger mb-1" href="<?= base_url('home/hapus/') . $r->id ?>"><i class="fas fa-trash-alt text-center"></i> Hapus</a> <a style="height:30px; width:90px; font-size:15px; padding:3px;" class="btn btn-info" href=""><i class="fa fa-pencil-alt text-center"></i> Ubah</a></td>
                                </tr>
                            </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('vendor/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('vendor/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>