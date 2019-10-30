<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Data
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-database"></i> My PC</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('master/tambah_processor') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Rakit PC</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered">
                            <?php foreach ($result as $r) : ?>
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
                                    <td><?= $r->ram ?></td>
                                </tr>
                                <tr>
                                    <th>Hardiks</th>
                                    <td><?= $r->hardisk ?></td>
                                </tr>
                                <tr>
                                    <th>SSD</th>
                                    <td><?= $r->ssd ?></td>
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
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->