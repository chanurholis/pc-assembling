<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

$time = Carbon::parse($date['tgl_diserahkan']);

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Detail Data
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-database"></i> My PC</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?php foreach ($result as $r) : ?>
                        <div class="box-header">
                            <a href="<?= base_url('Mypc/export_excel/') . $r->rakit_id ?>" class="btn btn-flat btn-success pull-right"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                        </div>
                        <div class="box-body table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>NO INDEKS</th>
                                    <td><?= $r->no_indeks ?></td>
                                </tr>
                                <tr>
                                    <th>INSTITUSI</th>
                                    <td><?= $r->institusi ?></td>
                                </tr>
                                <tr>
                                    <th>PENGGUNA</th>
                                    <td><?= $r->pengguna ?></td>
                                </tr>
                                <tr>
                                    <th>PROCESSOR</th>
                                    <td><?= $r->brand_processor ?> <?= $r->nama_processor ?></td>
                                </tr>
                                <tr>
                                    <th>MOTHERBOARD</th>
                                    <td><?= $r->brand_motherboard ?> <?= $r->motherboard ?></td>
                                </tr>
                                <tr>
                                    <th>RAM</th>
                                    <td><?= $r->brand_ram ?> <?= $r->nama_ram ?> DDR <?= $r->ddr ?> <?= $r->kapasitas_ram ?><?= $r->satuan ?></td>
                                </tr>
                                <tr>
                                    <th>STORAGE</th>
                                    <td><?= $r->brand_storage ?> <?= $r->nama_storage ?> <?= $r->type_storage ?> <?= $r->kapasitas_storage ?><?= $r->satuan_storage ?></td>
                                </tr>
                                <tr>
                                    <th>CASING</th>
                                    <td><?= $r->nama_casing ?></td>
                                </tr>
                                <tr>
                                    <th>VGA</th>
                                    <td><?= $r->nama_vga ?> <?= $r->type_vga ?></td>
                                </tr>
                                <tr>
                                    <th>PSU</th>
                                    <td><?= $r->nama_psu ?></td>
                                </tr>
                                <tr>
                                    <th>KEYBOARD</th>
                                    <td><?= $r->nama_keyboard ?></td>
                                </tr>
                                <tr>
                                    <th>MOUSE</th>
                                    <td><?= $r->nama_mouse ?></td>
                                </tr>
                                <tr>
                                    <th>MONITOR</th>
                                    <td><?= $r->nama_monitor ?></td>
                                </tr>
                                <tr>
                                    <th>DISERAHKAN</th>
                                    <td><?= $time->isoFormat('D MMMM Y') ?></td>
                                </tr>
                                <tr>
                                    <th>BUKTI</th>
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