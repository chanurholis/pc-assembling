<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Detail Data
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Mypc') ?>"><i class="fa fa-database"></i> My PC</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?php foreach ($result as $r) : ?>
                        <div class="box-header">
                            <a href="<?= base_url('Mypc/export_excel/') . $r->id ?>" class="btn btn-flat btn-success pull-right"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                            <a href="<?= base_url('Mypc/export_pdf/') . $r->id ?>" class="btn btn-flat btn-danger pull-right" style="margin-right:10px;"><i class="fa fa-file-pdf-o"></i> Export Pdf</a>
                        </div>
                        <div class="box-body table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>PC</th>
                                    <td><?= $r->nama_pc ?></td>
                                </tr>
                                <tr>
                                    <th>Institusi</th>
                                    <td><?= $r->institusi ?></td>
                                </tr>
                                <tr>
                                    <th>Pengguna</th>
                                    <td><?= $r->pengguna ?></td>
                                </tr>
                                <tr>
                                    <th>Processor</th>
                                    <td><?= $r->processor ?></td>
                                </tr>
                                <tr>
                                    <th>Motherboard</th>
                                    <td><?= $r->motherboard ?></td>
                                </tr>
                                <tr>
                                    <th>RAM</th>
                                    <td>DDR<?= $r->ram ?></td>
                                </tr>
                                <tr>
                                    <th>Storage</th>
                                    <td><?= $r->storage ?></td>
                                </tr>
                                <tr>
                                    <th>Casing</th>
                                    <td><?= $r->casing ?></td>
                                </tr>
                                <tr>
                                    <th>VGA</th>
                                    <td><?= $r->vga ?></td>
                                </tr>
                                <tr>
                                    <th>PSU</th>
                                    <td><?= $r->psu ?></td>
                                </tr>
                                <tr>
                                    <th>Keyboard</th>
                                    <td><?= $r->keyboard ?></td>
                                </tr>
                                <tr>
                                    <th>Mouse</th>
                                    <td><?= $r->mouse ?></td>
                                </tr>
                                <tr>
                                    <th>Monitor</th>
                                    <td><?= $r->monitor ?></td>
                                </tr>
                                <tr>
                                    <th>Diserahkan</th>
                                    <td><?= $r->tgl_diserahkan ?></td>
                                </tr>
                                <tr>
                                    <th>Bukti</th>
                                    <td><a href="<?= base_url('upload/bukti/') ?><?= $r->bukti ?>"><img src="<?= base_url('upload/bukti/') ?><?= $r->bukti ?>" alt="Bukti" width="200px" height="250px"></a></td>
                                </tr>
                            </table>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

    </section>
</div>