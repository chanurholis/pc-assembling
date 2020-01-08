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
                <h3 class="box-title">Ubah Data Master Storage</h3>
            </div>
            <form role="form" action="<?= base_url('Storage/aksi_ubah_storage') ?>" method="post">
                <?php foreach ($storage as $s) : ?>
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?= $s->storage_id ?>">
                        <div class="form-group col-md-8">
                            <label for="brand">Brand Storage</label>
                            <select name="brand_storage" id="brand" class="form-control select2" style="width: 100%;" autofocus>
                                <option value="" selected="selected">-- Pilih Brand --</option>
                                <?php foreach ($brand_storage as $b) : ?>
                                    <?php if ($s->brand_storage == $b->brand_storage) : ?>
                                        <option value="<?= $b->brand_storage ?>" selected><?= $b->brand_storage ?></option>
                                    <?php else : ?>
                                        <option value="<?= $b->brand_storage ?>"><?= $b->brand_storage ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('brand_storage', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama">Type Brand</label>
                            <input type="text" id="nama" name="nama_storage" value="<?= $s->nama_storage ?>" class="form-control">
                            <?= form_error('nama_storage', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="type">Type Storage</label>
                            <select name="type" id="type" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">-- Pilih DDR --</option>
                                <?php foreach ($type as $t) : ?>
                                    <?php if ($t == $s->type_storage) : ?>
                                        <option value="<?= $t ?>" selected><?= $t ?></option>
                                    <?php else : ?>
                                        <option value="<?= $t ?>"><?= $t ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('type', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="brand">Kapasitas</label>
                            <select name="kapasitas" id="brand" class="form-control select2">
                                <option value="">-- Pilih Kapasitas --</option>
                                <?php foreach ($kapasitas as $k) : ?>
                                    <?php if ($k->kapasitas_id == $s->kapasitas_id) : ?>
                                        <option value="<?= $k->kapasitas_id ?>" selected><?= $k->kapasitas_storage ?><?= $k->satuan ?></option>
                                    <?php else : ?>
                                        <option value="<?= $k->kapasitas_id ?>"><?= $k->kapasitas_storage ?><?= $k->satuan ?></option>
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
                <?php endforeach ?>
            </form>
        </div>

    </section>
</div>