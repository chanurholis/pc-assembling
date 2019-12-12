<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Kapasitas Storage
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Storage/kapasitas_storage') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('Storage/kapasitas_storage') ?>"> Storage</a></li>
            <li><a href="<?= base_url('Storage/kapasitas_storage') ?>"> Kapasitas Storage</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master Kapasitas Storage</h3>
            </div>
            <form role="form" action="<?= base_url('Storage/aksi_ubah_kapasitas_storage') ?>" method="post">
                <?php foreach ($kapasitas_storage as $k) : ?>
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?= $k->id ?>">
                        <div class="form-group col-md-8">
                            <label for="kapasitas">Kapasitas Storage</label>
                            <input type="number" id="kapasitas" name="kapasitas_storage" value="<?= $k->kapasitas_storage ?>" class="form-control" autofocus>
                            <?= form_error('kapasitas_storage', '<small class="text-danger">', '</small>') ?>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="brand">Satuan Storage</label>
                            <select name="satuan" id="brand" class="form-control select2" style="width: 100%;" autofocus>
                                <option value="" selected="selected">-- Pilih Satuan --</option>
                                <?php foreach ($satuan as $s) : ?>
                                    <?php if ($k->satuan == $s) : ?>
                                        <option value="<?= $s ?>" selected><?= $s ?></option>
                                    <?php else : ?>
                                        <option value="<?= $s ?>"><?= $s ?></option>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('satuan', '<small class="text-danger">', '</small>') ?>
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