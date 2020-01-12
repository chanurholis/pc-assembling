<div class="login" data-login="<?= $this->session->flashdata('login'); ?>"></div>
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            User
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-users"></i> User</a></li>
        </ol>
    </section>

    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah User</h3>
            </div>
            <form role="form" action="<?= base_url('User/tambah_user') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" autofocus value="<?= set_value('username') ?>">
                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class=" form-group col-md-8">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control select2">
                            <option value="" selected>-- Pilih Role --</option>
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r ?>" <?= set_select('role', $r) ?>><?= $r ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('role', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>

</div>