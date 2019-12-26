<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master DDR RAM
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> RAM</a></li>
            <li><a> Master DDR</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master DDR</h3>
            </div>
            <form role="form" action="<?= base_url('RAM/aksi_ubah_ddr_ram') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="ddr">DDR RAM</label>
                        <?php foreach ($ddr as $d) : ?>
                            <input type="hidden" name="id" id="ddr" value="<?= $d->ddr_id ?>">
                            <input type="number" id="ddr" name="ddr_ram" value="<?= $d->ddr ?>" class="form-control" autofocus>
                            <?= form_error('ddr_ram', '<small class="text-danger">', '</small>') ?>
                        <?php endforeach ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Ubah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>