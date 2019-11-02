<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Master Motherboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('master/tambah_processor') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-circle-o"></i> Motherboard</a></li>
            <li><a href="<?= base_url('master/tambah_processor') ?>"><i class="fa fa-circle-o"></i> Master Motherboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master Motherboard</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url('master/aksi_motherboard') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="brand">Brand Motherboard</label>
                        <select name="brand_motherboard" id="brand" class="form-control">
                            <option value="" selected>-- Pilih Brand --</option>
                            <?php foreach ($brand_motherboard as $m) : ?>
                                <option value="<?= $m->brand_motherboard ?>"><?= $m->brand_motherboard ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nama">Motherboard</label>
                        <input type="text" id="nama" name="motherboard" class="form-control">
                        <?= form_error('motherboard', '<small class="text-danger">', '</small>') ?>
                    </div>
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