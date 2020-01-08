<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Storage
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> Storage</a></li>
            <li><a> Master Storage</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master Storage</h3>
            </div>
            <form role="form" action="<?= base_url('Storage/tambah_storage') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="brand">Brand Storage</label>
                        <select name="brand_storage" id="brand" class="form-control select2" style="width: 100%;" autofocus>
                            <option value="" selected="selected">-- Pilih Brand --</option>
                            <?php foreach ($brand_storage as $d) : ?>
                                <option value="<?= $d->brand_storage_id ?>" <?= set_select('brand_storage', $d->brand_storage_id) ?>><?= $d->brand_storage ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('brand_storage', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nama">Type Brand</label>
                        <input type="text" style="text-transform: uppercase;" id="nama" name="nama_storage" class="form-control">
                        <?= form_error('nama_storage', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="type">Type Storage</label>
                        <select name="type" id="type" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Pilih Type Storage --</option>
                            <?php foreach ($type as $d) : ?>
                                <option value="<?= $d ?>"><?= $d ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('type', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="kapasitas">Kapasitas</label>
                        <select name="kapasitas" id="kapasitas" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Pilih Kapasitas --</option>
                            <?php foreach ($kapasitas_storage as $k) : ?>
                                <option value="<?= $k->kapasitas_id ?>"><?= $k->kapasitas_storage ?><?= $k->satuan ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kapasitas', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <input type="hidden" name="satuan" value="GB">
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>