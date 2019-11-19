<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            My PC
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-database"></i> My PC</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('Rakit') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Rakit PC</a>
                    </div>

                    <div class="box-body">
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" width="10px" class="text-center">NO</th>
                                        <th scope="col">PC</th>
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
                                            <td scope="row"><?= $r->nama_pc ?></td>
                                            <td scope="row"><?= $r->institusi ?></td>
                                            <td scope="row"><?= $r->pengguna ?></td>
                                            <td scope="row"><?= $r->processor ?></td>
                                            <td scope="row"><?= $r->ram ?></td>
                                            <td scope="row"><?= $r->storage ?></td>
                                            <td scope="row"><?= $r->motherboard ?></td>
                                            <td scope="row" class="text-center">
                                                <a href="<?= base_url('Mypc/detail/') . $r->id ?>"><span class="label label-success"><i class="fa fa-plus-circle"></i> Detail</span></a>
                                                <a href=""><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                                                <a class="tombol-hapus" href="<?= base_url('Mypc/hapus/') . $r->id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
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