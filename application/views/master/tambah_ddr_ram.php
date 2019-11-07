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
                <h3 class="box-title">Tambah Data Master DDR</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url('master/aksi_ddr_ram') ?>" method="post">
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
                <!-- /.box-body -->
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->