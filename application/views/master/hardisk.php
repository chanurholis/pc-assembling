<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Hardisk
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('master/hardisk') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('master/hardisk') ?>"><i class="fa fa-circle-o"></i> Hardisk</a></li>
            <li><a href="<?= base_url('master/hardisk') ?>"><i class="fa fa-circle-o"></i> Master Hardisk</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('master/tambah_hardisk') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Hardisk</a>
                        <div class="box-tools">
                            <div class="input-group input-group hidden-xs" style="width: 200px; margin-top:5px;">
                                <form action="<?= base_url('master/search_hardisk') ?>" method="post">
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
                                <th scope="col">Brand Hardisk</th>
                                <th scope="col">Hardisk</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col">Satuan</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($hardisk as $h) { ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $no++ ?></td>
                                    <td scope="row"><?= $h->brand_hardisk ?></td>
                                    <td scope="row"><?= $h->nama_hardisk ?></td>
                                    <td scope="row"><?= $h->kapasitas ?></td>
                                    <td scope="row"><?= $h->satuan_kapasitas ?></td>
                                    <td scope="row" class="text-center">
                                        <a href="<?= base_url('master/ubah_hardisk/') . $h->id ?>"><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                                        <a onclick="return confirm('Yakin?');" href="<?= base_url('master/hapus_hardisk/') . $h->id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">Previous</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->