<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Storage
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Storage') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('Storage') ?>"> Storage</a></li>
            <li><a href="<?= base_url('Storage') ?>"> Master Storage</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('Storage/tambah_storage') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Storage</a>
                        <div class="box-tools">
                            <div class="input-group input-group hidden-xs" style="width: 200px; margin-top:5px;">
                                <form action="<?= base_url('Storage/search_storage') ?>" method="post">
                                    <input type="text" name="keyword" class="form-control pull-right" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-center" scope="col" width="10px;">No</th>
                                <th scope="col">Brand Storage</th>
                                <th scope="col">Storage</th>
                                <th scope="col">Type Storage</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($storage as $r) { ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $no++ ?></td>
                                    <td scope="row"><?= $r->brand_storage ?></td>
                                    <td scope="row"><?= $r->nama_storage ?></td>
                                    <td scope="row"><?= $r->type ?></td>
                                    <td scope="row"><?= $r->kapasitas ?></td>
                                    <td scope="row" class="text-center">
                                        <a href="<?= base_url('Storage/ubah_storage/') . $r->id ?>"><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                                        <a class="tombol-hapus" href="<?= base_url('Storage/hapus_storage/') . $r->id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>