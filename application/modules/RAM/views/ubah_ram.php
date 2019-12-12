<div class="content-wrapper">
    <section class="content-header">
        <h1>
            RAM
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('RAM') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('RAM') ?>"> RAM</a></li>
            <li><a href="<?= base_url('RAM') ?>"> Master RAM</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master RAM</h3>
            </div>
            <form role="form" action="<?= base_url('RAM/aksi_ubah_ram') ?>" method="post">
                <div class="box-body">
                    <input type="hidden" name="id" value="<?= $ram['id'] ?>">
                    <div class="form-group col-md-8">
                        <label for="brand">Brand</label>
                        <select name="brand_ram" id="brand" class="form-control select2" style="width: 100%;" autofocus>
                            <option value="" selected="selected">-- Pilih Brand --</option>
                            <?php foreach ($brand as $d) : ?>
                                <?php if ($d->brand_ram == $ram['brand_ram']) : ?>
                                    <option value="<?= $d->brand_ram ?>" selected><?= $d->brand_ram ?></option>
                                <?php else :  ?>
                                    <option value="<?= $d->brand_ram ?>"><?= $d->brand_ram ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('brand_ram', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nama">Type RAM</label>
                        <?php foreach ($result as $r) : ?>
                            <input type="text" id="nama" value="<?= $r->nama_ram ?>" name="nama_ram" class="form-control">
                        <?php endforeach ?>
                        <?= form_error('nama_ram', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="brand">DDR</label>
                        <select name="ddr" id="brand" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Pilih DDR --</option>
                            <?php foreach ($ddr as $d) : ?>
                                <?php if ($d->ddr == $ram['ddr']) : ?>
                                    <option value="<?= $d->ddr ?>" selected><?= $d->ddr ?></option>
                                <?php else : ?>
                                    <option value="<?= $d->ddr ?>"><?= $d->ddr ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('ddr', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="brand">Kapasitas</label>
                        <select name="kapasitas" id="brand" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Pilih Kapasitas --</option>
                            <?php foreach ($kapasitas as $k) : ?>
                                <?php if ($k->kapasitas_ram == $ram['kapasitas']) : ?>
                                    <option value="<?= $k->kapasitas_ram ?>" selected><?= $k->kapasitas_ram ?><?= $k->satuan ?></option>
                                <?php else : ?>
                                    <option value="<?= $k->kapasitas_ram ?>"><?= $k->kapasitas_ram ?><?= $k->satuan ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kapasitas', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <input type="hidden" name="satuan" value="GB">
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Ubah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>