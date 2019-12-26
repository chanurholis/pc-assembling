<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Processor
        </h1>
        <ol class="breadcrumb">
            <li><a><i class=" fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> Processor</a></li>
            <li><a> Master Processor</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('Processor/tambah_processor') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Processor</a>
                        <div class="box-tools">
                            <div class="input-group input-group hidden-xs" style="width: 200px; margin-top:5px;">
                                <form action="<?= base_url('Processor/search_processor') ?>" method="post">
                                    <input type="text" name="keyword" class="form-control pull-right" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-center" scope="col" width="10px;">No</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Processor</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                            <?php
                                                $no = 1;
                                                foreach ($processor as $p) { ?>
                                <tr>
                                    <td class="text-center" scope="row"><?= $no++ ?></td>
                                    <td scope="row"><?= $p->brand_processor ?></td>
                                    <td scope="row"><?= $p->nama_processor ?></td>
                                    <td scope="row" class="text-center">
                                        <a href="<?= base_url('Processor/ubah_processor/') . $p->processor_id ?>"><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                                        <a class="tombol-hapus" href="<?= base_url('Processor/hapus_processor/') . $p->processor_id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>