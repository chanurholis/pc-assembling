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
                <h3 class="box-title">Ubah User</h3>
            </div>
            <form role="form" action="<?= base_url('User/aksi_ubah_user') ?>" method="post">
                <div class="box-body">
                    <?php foreach ($user as $u) : ?>
                        <input type="hidden" name="id" value="<?= $u->id ?>">
                        <div class="form-group col-md-8">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" autofocus value="<?= $u->username ?>">
                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class=" form-group col-md-8">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control select2">
                                <option value="" selected>-- Pilih Role --</option>
                                <?php foreach ($role as $r) : ?>
                                    <?php if ($u->role == $r) : ?>
                                        <option value="<?= $r ?>" selected><?= $r ?></option>
                                    <?php else : ?>
                                        <option value="<?= $r ?>"><?= $r ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('role', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class=" form-group col-md-8">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control select2">
                                <?php foreach ($status as $s) : ?>
                                    <?php if ($u->is_active == $s) : ?>
                                        <option value="<?= $s ?>" selected><?= $s ?></option>
                                    <?php else : ?>
                                        <option value="<?= $s ?>"><?= $s ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('role', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-8">
                            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Ubah</button>
                        </div>
                    <?php endforeach ?>
                </div>
            </form>
        </div>

    </section>

</div>