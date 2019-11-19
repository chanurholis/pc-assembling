<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master Brand
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Storage/brand_storage') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('Storage/brand_storage') ?>"> Storage</a></li>
            <li><a href="<?= base_url('Storage/brand_storage') ?>"> Master Brand</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('Storage/tambah_brand_storage') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Brand Hardisk</a>
                        <div class="box-tools">
                            <div class="input-group input-group hidden-xs" style="width: 200px; margin-top:5px;">
                                <form action="<?= base_url('Storage/search_brand_storage') ?>" method="post">
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select name="keyword" class="form-control select2" style="width: 100%;">
                                                    <option value="" selected>Filter Storage</option>
                                                    <option value="HDD">HDD</option>
                                                    <option value="SSD">SSD</option>
                                                </select>

                                                <div class="input-group-addon">
                                                    <button type="submit"><i class="fa fa-send text-primary "></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-center" scope="col" width="10px;">No</th>
                                <th scope="col">Brand Storage</th>
                                <th scope="col">Type</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($storage as $s) { ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $no++ ?></td>
                                    <td scope="row"><?= $s->brand_storage ?></td>
                                    <td scope="row"><?= $s->type ?></td>
                                    <td scope="row" class="text-center">
                                        <a href="<?= base_url('Storage/ubah_brand_storage/') . $s->id ?>"><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                                        <a class="tombol-hapus" href="<?= base_url('Storage/hapus_brand_storage/') . $s->id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
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