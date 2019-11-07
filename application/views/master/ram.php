<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            RAM
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-circle-o"></i> RAM</a></li>
            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-circle-o"></i> Master RAM</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('master/tambah_ram') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> RAM</a>
                        <div class="box-tools">
                            <div class="input-group input-group hidden-xs" style="width: 200px; margin-top:5px;">
                                <form action="<?= base_url('master/search_ram') ?>" method="post">
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
                                <th scope="col">DDR</th>
                                <th scope="col">Brand RAM</th>
                                <th scope="col">Type RAM</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($ram as $r) { ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $no++ ?></td>
                                    <td scope="row"><?= $r->ddr ?></td>
                                    <td scope="row"><?= $r->brand_ram ?></td>
                                    <td scope="row"><?= $r->nama_ram ?></td>
                                    <td scope="row"><?= $r->kapasitas ?><?= $r->satuan ?></td>
                                    <td scope="row" class="text-center">
                                        <a href="<?= base_url('master/ubah_ram/') . $r->id ?>"><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                                        <a class="tombol-hapus" href="<?= base_url('master/hapus_ram/') . $r->id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
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