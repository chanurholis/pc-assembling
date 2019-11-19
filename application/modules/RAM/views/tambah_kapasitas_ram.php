<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Kapasitas RAM
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('RAM/tambah_kapasitas_ram') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('RAM/tambah_kapasitas_ram') ?>"> RAM</a></li>
            <li><a href="<?= base_url('RAM/tambah_kapasitas_ram') ?>"> Kapasitas RAM</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master Kapasitas RAM</h3>
            </div>
            <form role="form" action="<?= base_url('RAM/tambah_kapasitas_ram') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="kapasitas">Kapasitas RAM</label>
                        <input type="number" id="kapasitas" name="kapasitas_ram" class="form-control" autofocus>
                        <?= form_error('kapasitas_ram', '<small class="text-danger">', '</small>') ?>
                        <?= $this->session->flashdata('message'); ?>
                        <small>Note : Satuan GB</small>
                        <input type="hidden" value="GB" name="satuan" class="form-control">
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>