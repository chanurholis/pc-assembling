<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master DDR
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('master/tambah_processor') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-circle-o"></i> RAM</a></li>
            <li><a href="<?= base_url('master/tambah_processor') ?>"><i class="fa fa-circle-o"></i> Master DDR</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master DDR</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url('master/aksi_ubah_ddr_ram') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="ddr">DDR RAM</label>
                        <?php foreach ($ddr as $d) : ?>
                            <input type="hidden" name="id" id="ddr" value="<?= $d->id ?>">
                            <input type="number" id="ddr" name="ddr_ram" value="<?= $d->ddr ?>" class="form-control">
                            <?= form_error('ddr_ram', '<small class="text-danger">', '</small>') ?>
                        <?php endforeach ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Ubah</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->