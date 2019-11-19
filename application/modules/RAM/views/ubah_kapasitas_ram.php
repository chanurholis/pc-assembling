<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Kapasitas RAM
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('RAM/kapasitas_ram') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('RAM/kapasitas_ram') ?>"> RAM</a></li>
            <li><a href="<?= base_url('RAM/kapasitas_ram') ?>"> Kapasitas Ram</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master Kapasitas RAM</h3>
            </div>
            <form role="form" action="<?= base_url('RAM/aksi_ubah_kapasitas_ram') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <?php foreach ($kapasitas_ram as $k) : ?>
                            <label for="kapasitas">Kapasitas RAM</label>
                            <input type="hidden" name="id" value="<?= $k->id ?>">
                            <input type="text" id="kapasitas" name="kapasitas_ram" value="<?= $k->kapasitas_ram ?>" class="form-control" autofocus>
                            <?= form_error('kapasitas_ram', '<small class="text-danger">', '</small>') ?>
                            <?= $this->session->flashdata('message') ?>
                        <?php endforeach ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Ubah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>