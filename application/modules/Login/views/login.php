<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul ?></title>
    <link rel="icon" type="png/image" href="<?= base_url('assets/ypbpi.png') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 mt-2 rounded-0">

                <div class="card o-hidden border-0 shadow-lg my-5 rounded-0">
                    <div class="card-body p-0 rounded-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block rounded-0">
                                <img style="margin-left:100px;" class="mt-3" src="<?= base_url('assets/ubuntu.png') ?>" width="300px" height="300px" alt="">
                            </div>
                            <div class="col-lg-6 rounded-0">
                                <div class="p-5 rounded-0">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">PC Assembling</h1>
                                    </div>
                                    <form method="post" action="<?= base_url('Login') ?>" class="user">
                                        <div class="form-group">
                                            <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control form-control-user rounded-0" placeholder="Username" autofocus>
                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                            <?= $this->session->flashdata('message'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control form-control-user rounded-0" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                            <?= $this->session->flashdata('message'); ?>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block rounded-0">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a style="text-decoration:none" class="small text-primary">Lupa Password? Hubungi Administrator!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>