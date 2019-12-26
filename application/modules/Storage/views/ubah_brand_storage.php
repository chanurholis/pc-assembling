<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master Brand
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> Storage</a></li>
            <li><a> Master Brand</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master Brand</h3>
            </div>
            <form role="form" action="<?= base_url('Storage/aksi_ubah_brand_storage') ?>" method="post">
                <?php foreach ($storage as $s) : ?>
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?= $s->brand_storage_id ?>">
                        <div class="form-group col-md-8">
                            <label for="brand">Brand Storage</label>
                            <input type="text" id="brand" name="brand_storage" value="<?= $s->brand_storage ?>" class="form-control" autofocus>
                            <?= form_error('brand_storage', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="brand">Storage</label>
                            <select name="type" id="brand" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">-- Pilih Storage --</option>
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
                            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Ubah</button>
                        </div>
                    </div>
                <?php endforeach ?>
            </form>
        </div>

    </section>
</div>