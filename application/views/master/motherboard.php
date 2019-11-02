<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Motherboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-circle-o"></i> Motherboard</a></li>
            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-circle-o"></i> Master Motherboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('master/tambah_motherboard') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Motherboard</a>
                        <div class="box-tools">
                            <div class="input-group input-group" style="width: 190px; margin-top:5px;">
                                <form action="<?= base_url('master/search_motherboard') ?>" method="post">
                                    <input type="text" name="keyword" class="form-control pull-right" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-center" scope="col" width="10px;">No</th>
                                <th scope="col">Brand Motherboard</th>
                                <th scope="col">Motherboard</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($motherboard as $m) { ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $no++ ?></td>
                                    <td scope="row"><?= $m->brand_motherboard ?></td>
                                    <td scope="row"><?= $m->motherboard ?></td>
                                    <td scope="row" class="text-center">
                                        <a href="<?= base_url('master/ubah_motherboard/') . $m->id ?>"><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                                        <a class="tombol-hapus" href="<?= base_url('master/hapus_motherboard/') . $m->id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->