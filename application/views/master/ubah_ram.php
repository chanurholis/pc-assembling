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
                <h3 class="box-title">Ubah Data Master RAM</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url('master/aksi_ubah_ram') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="brand">DDR</label>
                        <select name="ddr" id="brand" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Pilih DDR --</option>
                            <?php foreach ($ddr as $d) : ?>
                                <?php if ($d->ddr == $ram['ddr']) : ?>
                                    <option value="<?= $d->ddr ?>" selected><?= $d->ddr ?></option>
                                <?php else : ?>
                                    <option value="<?= $d->ddr ?>"><?= $d->ddr ?></option>
                                <?php endif; ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <?php foreach ($result as $r) : ?>
                        <input type="hidden" name="id" value="<?= $r->id ?>">
                        <div class="form-group col-md-8">
                            <label for="nama">Brand RAM</label>
                            <input type="text" id="nama" name="brand_ram" value="<?= $r->brand_ram ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama">RAM</label>
                            <input type="text" id="nama" name="nama_ram" value="<?= $r->nama_ram ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama">Kapasitas</label>
                            <input type="number" id="nama" name="kapasitas" value="<?= $r->kapasitas ?>" class="form-control">
                        </div>
                    <?php endforeach ?>
                    <div class="form-group col-md-8">
                        <label for="brand">Satuan</label>
                        <select name="satuan_kapasitas" id="brand" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Pilih Satuan --</option>
                            <?php foreach ($kapasitas as $s) : ?>
                                <?php if ($s->kapasitas_ram == $ram['satuan_kapasitas']) : ?>
                                    <option selected value="<?= $s->kapasitas_ram ?>"><?= $s->kapasitas_ram ?></option>
                                <?php else : ?>
                                    <option value="<?= $s->kapasitas_ram ?>"><?= $s->kapasitas_ram ?></option>
                                <?php endif; ?>
                            <?php endforeach ?>
                        </select>
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