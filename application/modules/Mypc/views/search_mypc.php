<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            My PC
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-database"></i> My PC</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('Mypc/export_excel_filter') ?>" class="btn btn-flat btn-success"><i class="fa fa-file-excel-o"> Export Excel</i></a>
                        <div class="box-tools">
                            <div class="input-group input-group hidden-xs" style="width: 200px; margin-top:5px;">
                                <form action="<?= base_url('Mypc/search_mypc') ?>" method="post">
                                    <input type="text" name="keyword" class="form-control pull-right" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="result" class="box-body">
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" width="10px" class="text-center">NO</th>
                                        <th scope="col">NO INDEKS</th>
                                        <th scope="col">INSTITUSI</th>
                                        <th scope="col">PENGGUUNA</th>
                                        <th scope="col">PROCESSOR</th>
                                        <th scope="col">RAM</th>
                                        <th scope="col">STORAGE</th>
                                        <th scope="col">MOBO</th>
                                        <th scope="col" width="300px" class="text-center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($rakit as $r) : ?>
                                        <tr>
                                            <td scope="row" class="text-center"><?= $no++ ?></td>
                                            <td scope="row" style="text-transform: uppercase"><?= $r->no_indeks ?></td>
                                            <td scope="row"><?= $r->institusi ?></td>
                                            <td scope="row"><?= $r->pengguna ?></td>
                                            <td scope="row"><?= $r->brand_processor ?> <?= $r->nama_processor ?></td>
                                            <td scope="row"><?= $r->brand_ram ?> <?= $r->nama_ram ?> DDR <?= $r->ddr ?> <?= $r->kapasitas_ram ?><?= $r->satuan_ram ?></td>
                                            <td scope="row"><?= $r->brand_storage ?> <?= $r->nama_storage ?> <?= $r->type_storage ?> <?= $r->kapasitas_storage ?><?= $r->satuan ?></td>
                                            <td scope="row"><?= $r->brand_motherboard ?> <?= $r->motherboard ?></td>
                                            <td scope="row" class="text-center">
                                                <a href="<?= base_url('Mypc/detail/') . $r->rakit_id ?>"><span class="label label-success"><i class="fa fa-plus-circle"></i> Detail</span></a>
                                                <a href="<?= base_url('Mypc/ubah/') . $r->rakit_id ?>"><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                                                <a class="tombol-hapus" href="<?= base_url('Mypc/hapus/') . $r->rakit_id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
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