<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Ubah Password
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <form role="form" action="<?= base_url('Home/aksi_ubah_password') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="password">Password Lama</label>
                        <input type="password" id="password" name="password" class="form-control" autofocus>
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="password1">Password Baru</label>
                        <input type="password" id="password1" name="password1" class="form-control" autofocus>
                        <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="password2">Ulangi Password Baru</label>
                        <input type="password" id="password2" name="password2" class="form-control" autofocus>
                        <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-refresh"></i> Ubah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>