<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            User
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-users"></i> User</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('User/tambah_user') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> User</a>
                        <div class="box-tools">
                            <div class="input-group input-group hidden-xs" style="width: 200px; margin-top:5px;">
                                <form action="<?= base_url('User/search_user') ?>" method="post">
                                    <input type="text" name="keyword" class="form-control pull-right col-4" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-center" scope="col" width="10px;">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th class="text-center" scope="col">Status</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($user as $u) : ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $u->id ?></td>
                                    <td scope="row"><?= $u->username ?></td>
                                    <td scope="row"><?= $u->role ?></td>
                                    <?php if ($u->is_active == 'Aktif') : ?>
                                        <td class="text-center" scope="row"><span class="label label-success">Aktif</span></td>
                                    <?php else : ?>
                                        <td class="text-center" scope="row"><span class="label label-danger">Tidak Aktif</span></td>
                                    <?php endif ?>
                                    <td scope="row" class="text-center">
                                        <a class="tombol-ubah" href="<?= base_url('User/ubah_user/') . $u->id ?>"><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                                        <a class="tombol-reset-password" href="<?= base_url('User/reset_password/') . $u->id ?>"><span class="label label-warning"><i class="fa fa-refresh"></i> Reset Password</span></a>
                                        <a class="tombol-hapus-user" href="<?= base_url('User/hapus_user/') . $u->id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>

                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <!-- Pagination -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>