<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Kapasitas Storage
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> Storage</a></li>
            <li><a> Kapasitas Storage</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master Kapasitas Storage</h3>
            </div>
            <form role="form" action="<?= base_url('Storage/tambah_kapasitas_storage') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="id">ID Kapasitas Storage</label>
                        <input type="number" id="id" name="id_kapasitas_storage" value="<?= set_value('id_kapasitas_storage') ?>" class="form-control" autofocus>
                        <?= form_error('id_kapasitas_storage', '<small class="text-danger">', '</small>') ?>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="kapasitas">Kapasitas Storage</label>
                        <input type="number" id="kapasitas" name="kapasitas_storage" value="<?= set_value('kapasitas_storage') ?>" class="form-control" autofocus>
                        <?= form_error('kapasitas_storage', '<small class="text-danger">', '</small>') ?>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="brand">Satuan Storage</label>
                        <select name="satuan" id="brand" class="form-control select2" style="width: 100%;" autofocus>
                            <option value="" selected="selected">-- Pilih Satuan --</option>
                            <?php foreach ($satuan as $s) : ?>
                                <option value="<?= $s ?>" <?= set_select('satuan', $s) ?>><?= $s ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('satuan', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>