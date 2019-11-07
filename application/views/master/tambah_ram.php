<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            RAM
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('master/ram') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('master/ram') ?>"><i class="fa fa-circle-o"></i> RAM</a></li>
            <li><a href="<?= base_url('master/ram') ?>"><i class="fa fa-circle-o"></i> Master RAM</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master RAM</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url('master/aksi_ram') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="brand">Brand</label>
                        <select name="brand_ram" id="brand" class="form-control select2" style="width: 100%;" autofocus>
                            <option value="" selected="selected">-- Pilih Brand --</option>
                            <?php foreach ($brand as $d) : ?>
                                <option value="<?= $d->brand_ram ?>"><?= $d->brand_ram ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('brand_ram', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nama">Type RAM</label>
                        <input type="text" id="nama" name="nama_ram" class="form-control">
                        <?= form_error('nama_ram', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="brand">DDR</label>
                        <select name="ddr" id="brand" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Pilih DDR --</option>
                            <?php foreach ($ddr as $d) : ?>
                                <option value="<?= $d->ddr ?>"><?= $d->ddr ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('ddr', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="brand">Kapasitas</label>
                        <select name="kapasitas" id="brand" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Pilih Kapasitas --</option>
                            <?php foreach ($kapasitas as $k) : ?>
                                <option value="<?= $k->kapasitas_ram ?>"><?= $k->kapasitas_ram ?><?= $k->satuan ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kapasitas', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <input type="hidden" name="satuan" value="GB">
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