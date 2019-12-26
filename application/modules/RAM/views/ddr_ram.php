<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master DDR
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> RAM</a></li>
            <li><a> Master DDR</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('RAM/tambah_ddr_ram') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> DDR RAM</a>
                        <div class="box-tools">
                            <div class="input-group input-group hidden-xs" style="width: 200px; margin-top:5px;">
                                <form action="<?= base_url('RAM/search_ddr_ram') ?>" method="post">
                                    <input type="text" name="keyword" class="form-control pull-right" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-center" scope="col" width="10px;">No</th>
                                <th scope="col">DDR</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($ddr as $d) { ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $no++ ?></td>
                                    <td scope="row"><?= $d->ddr ?></td>
                                    <td scope="row" class="text-center">
                                        <a href="<?= base_url('RAM/ubah_ddr_ram/') . $d->ddr_id ?>"><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                                        <a class="tombol-hapus" href="<?= base_url('RAM/hapus_ddr_ram/') . $d->ddr_id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
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