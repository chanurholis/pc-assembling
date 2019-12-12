<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master DDR
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('RAM/ddr_ram') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('RAM/ddr_ram') ?>"> RAM</a></li>
            <li><a href="<?= base_url('RAM/ddr_ram') ?>"> Master DDR</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master DDR</h3>
            </div>
            <form role="form" action="<?= base_url('RAM/tambah_ddr_ram') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="ram">DDR RAM</label>
                        <input type="number" id="ddr" name="ddr_ram" class="form-control" autofocus>
                        <?= form_error('ddr_ram', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>